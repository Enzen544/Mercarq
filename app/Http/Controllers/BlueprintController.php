<?php

namespace App\Http\Controllers;
/**
 * @property-read \App\Models\User $user
 */
use App\Models\Blueprint;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlueprintController extends Controller
{
    public function index()
    {
        // Obtener solo los planos del usuario autenticado
        $blueprints = Auth::user()->blueprints()->latest()->paginate(9);

        return view('blueprints.index', compact('blueprints'));
    }

    public function create()
    {
        return view('blueprints.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'is_public' => 'required|boolean',
            'file' => 'required|file|mimes:pdf,dwg,dxf|max:10240', // Max 10MB
        ]);

        $filePath = $request->file('file')->store('blueprints', 'public');

        Auth::user()->blueprints()->create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'is_public' => $request->is_public,
            'file_path' => $filePath,
        ]);

        return redirect()->route('blueprints.index')->with('success', 'Plano subido exitosamente.');
    }

    public function show(Blueprint $blueprint)
    {
        // Verificar permisos si es necesario
        return view('blueprints.show', compact('blueprint'));
    }

    public function edit(Blueprint $blueprint)
    {
        // Verificar que el plano pertenezca al usuario
        if ($blueprint->user_id !== Auth::id()) {
            abort(403);
        }
        return view('blueprints.edit', compact('blueprint'));
    }

    public function update(Request $request, Blueprint $blueprint)
    {
        // Verificar que el plano pertenezca al usuario
        if ($blueprint->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'is_public' => 'required|boolean',
            // Validación para el archivo opcional
            'file' => 'nullable|file|mimes:pdf,dwg,dxf|max:10240',
        ]);

        $data = $request->only(['title', 'description', 'price', 'is_public']);

        if ($request->hasFile('file')) {
            // Eliminar el archivo anterior si se sube uno nuevo
            Storage::disk('public')->delete($blueprint->file_path);
            $data['file_path'] = $request->file('file')->store('blueprints', 'public');
        }

        $blueprint->update($data);

        return redirect()->route('blueprints.index')->with('success', 'Plano actualizado exitosamente.');
    }

    public function destroy(Blueprint $blueprint)
    {
        // Verificar que el plano pertenezca al usuario
        if ($blueprint->user_id !== Auth::id()) {
            abort(403);
        }

        // Eliminar el archivo del almacenamiento
        Storage::disk('public')->delete($blueprint->file_path);

        $blueprint->delete();

        return redirect()->route('blueprints.index')->with('success', 'Plano eliminado exitosamente.');
    }
}
