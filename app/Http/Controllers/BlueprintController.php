<?php

namespace App\Http\Controllers;

use App\Models\Blueprint;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\WhatsAppPurchaseNotification;
use App\Mail\FreeDownloadNotification;
use App\Mail\FreeDownloadOwnerNotification; 

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
            'whatsapp_number' => 'required|string|max:20',
            'file' => 'required|file|mimes:pdf,dwg,dxf,jpg,jpeg,png|max:10240', 
            'terms' => 'required|accepted',
        ]);

        $file = $request->file('file');
        $filePath = $file->store('blueprints', 'public');

        Auth::user()->blueprints()->create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'is_public' => $request->is_public,
            'whatsapp_number' => $request->whatsapp_number,
            'file_path' => $filePath,
            'file_size' => $file->getSize(),
        ]);

        return redirect()->route('blueprints.index')->with('success', 'Plano subido exitosamente.');
    }

    public function show(Blueprint $blueprint)
    {
        if ($blueprint->user_id !== Auth::id() && !$blueprint->is_public) {
            abort(403);
        }
        
        return view('blueprints.show', compact('blueprint'));
    }

    public function edit(Blueprint $blueprint)
    {
        if ($blueprint->user_id !== Auth::id()) {
            abort(403);
        }
        return view('blueprints.edit', compact('blueprint'));
    }

    public function update(Request $request, Blueprint $blueprint)
    {
        if ($blueprint->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'is_public' => 'required|boolean',
            'whatsapp_number' => 'required|string|max:20',
            'file' => 'nullable|file|mimes:pdf,dwg,dxf,jpg,jpeg,png|max:10240',
        ]);

        $data = $request->only(['title', 'description', 'price', 'is_public', 'whatsapp_number']);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($blueprint->file_path);
            
            $file = $request->file('file');
            $data['file_path'] = $file->store('blueprints', 'public');
            $data['file_size'] = $file->getSize();
        }

        $blueprint->update($data);

        return redirect()->route('blueprints.index')->with('success', 'Plano actualizado exitosamente.');
    }

    public function destroy(Blueprint $blueprint)
    {
        if ($blueprint->user_id !== Auth::id()) {
            abort(403);
        }

        Storage::disk('public')->delete($blueprint->file_path);

        $blueprint->delete();

        return redirect()->route('blueprints.index')->with('success', 'Plano eliminado exitosamente.');
    }

    /**
     */
    public function whatsappPurchase(Request $request, Blueprint $blueprint)
    {
        $request->validate([
            'buyer_name' => 'required|string|max:255',
            'buyer_email' => 'required|email',
            'buyer_whatsapp' => 'required|string|max:20',
            'buyer_message' => 'nullable|string|max:500',
        ]);

        $buyerData = [
            'name' => $request->buyer_name,
            'email' => $request->buyer_email,
            'whatsapp' => '+57' . $request->buyer_whatsapp,
            'message' => $request->buyer_message,
        ];

        try {
            Mail::to($blueprint->user->email)->send(
                new WhatsAppPurchaseNotification($blueprint, $buyerData)
            );

            return redirect()->back()->with('success', 
                '¡Solicitud enviada! El vendedor te contactará por WhatsApp pronto.');
                
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 
                'Error al enviar la solicitud. Intenta nuevamente.');
        }
    }

    /**
     */
    public function freeDownload(Request $request, Blueprint $blueprint)
    {
        if ($blueprint->price > 0) {
            abort(403, 'Este plano no es gratuito');
        }

        $request->validate([
            'downloader_name' => 'required|string|max:255',
            'downloader_email' => 'required|email',
        ]);

        $downloaderData = [
            'name' => $request->downloader_name,
            'email' => $request->downloader_email,
        ];

        try {
            Mail::to($request->downloader_email)->send(
                new FreeDownloadNotification($blueprint, $downloaderData)
            );

            // ✅ CORREGIDO: Notificar al propietario del plano
            Mail::to($blueprint->user->email)->send(
                new FreeDownloadOwnerNotification($blueprint, $downloaderData)
            );

            return redirect()->back()->with('success', 
                '¡Plano enviado! Revisa tu correo electrónico.');
                
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 
                'Error al enviar el plano. Intenta nuevamente.');
        }
    }

    /**
     */
    public function publicShow(Blueprint $blueprint)
    {
        if (!$blueprint->is_public) {
            abort(404);
        }

        return view('blueprints.public_show', compact('blueprint'));
    }

    /**
     */
    public function publicIndex()
    {
        $blueprints = Blueprint::where('is_public', true)
            ->with('user')
            ->latest()
            ->paginate(12);

        return view('blueprints.public_index', compact('blueprints'));
    }
}