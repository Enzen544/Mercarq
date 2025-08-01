<?php

namespace App\Http\Controllers;

use App\Models\Blueprint;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\WhatsAppPurchaseNotification;
use App\Mail\FreeDownloadNotification;
use App\Mail\FreeDownloadOwnerNotification;
use App\Models\Solicitud;
use Illuminate\Support\Str;
use mysql_xdevapi\Executable;

class BlueprintController extends Controller
{
   public function index()
{
    $user = Auth::user();

    if (!$user) {
        abort(403, 'Acceso no autorizado. Debes iniciar sesión.');
    }

    $blueprints = $user->blueprints()->latest()->paginate(9);

    \Log::info('Mostrando planos para el usuario: ' . $user->id, ['count' => $blueprints->total()]);

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
        'price' => 'required|integer|min:0',
        'is_public' => 'required|boolean',
        'whatsapp_number' => 'required|string|max:20',
        'file' => 'required|file|mimes:pdf,dwg,dxf,jpg,jpeg,png|max:10240',
        'terms' => 'required|accepted',
    ]);

    $file = $request->file('file');

    $originalName = $file->getClientOriginalName();
    $filePath = $file->storeAs('blueprints', $originalName, 'public');

    $nuevoCodigo = (string) Str::uuid();
    Auth::user()->blueprints()->create([
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'is_public' => $request->is_public,
        'whatsapp_number' => $request->whatsapp_number,
        'file_path' => $filePath,
        'file_size' => $file->getSize(),
        'codigo_compra' => $nuevoCodigo,
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
        'price' => 'required|integer|min:0',
        'whatsapp_number' => 'required|string|max:20',
        'file' => 'nullable|file|mimes:pdf,dwg,dxf,jpg,jpeg,png|max:10240',
    ]);

    $data = $request->only(['title', 'description', 'price', 'whatsapp_number']);

    $data['is_public'] = $request->has('is_public');

    if ($request->hasFile('file')) {
        Storage::disk('public')->delete($blueprint->file_path);
        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $data['file_path'] = $file->storeAs('blueprints', $originalName, 'public');
        $data['file_size'] = $file->getSize();
    }

    $blueprint->update($data);
    $nuevoCodigo = (string) Str::uuid();
    $blueprint->codigo_compra = $nuevoCodigo;
    $blueprint->save();

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
    /**
 *
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
   //

   public function publicIndex(Request $request)
    {
        $searchTerm = $request->input('search');

        \Log::info('Búsqueda solicitada', ['termino' => $searchTerm]);

        $query = Blueprint::where('is_public', true)->with('user')->latest();


        if ($searchTerm) {
            $searchTerm = trim($searchTerm);

            $query->where(function($subQuery) use ($searchTerm) {
                $subQuery->where('title', 'LIKE', '%' . $searchTerm . '%')
                         ->orWhere('description', 'LIKE', '%' . $searchTerm . '%');
            });

            \Log::info('Consulta SQL generada', ['sql' => $query->toSql(), 'bindings' => $query->getBindings()]);
        }


        $blueprints = $query->paginate(6);


        return view('blueprints.public_index', compact('blueprints'));
    }
 /**
 */
public function downloadFree(Blueprint $blueprint)
{
    if ($blueprint->price > 0) {
        abort(403, 'Este plano no es gratuito');
    }

    if (!$blueprint->is_public) {
        abort(404);
    }
 try {
        Solicitud::create([
            'blueprint_id' => $blueprint->id,
            'tipo_solicitud' => 'descarga_gratuita',
            'nombre_solicitante' => 'Usuario Anónimo (Descarga Directa)',
            'email_solicitante' => null,
            'telefono_solicitante' => null,
            'mensaje' => 'Descarga directa desde la página pública del plano.',
            'ip_address' => request()->ip(),
        ]);
        \Log::info('Solicitud de descarga gratuita registrada desde descarga directa', ['blueprint_id' => $blueprint->id]);
    } catch (\Exception $e) {
        \Log::error('Error al registrar solicitud de descarga gratuita desde descarga directa: ' . $e->getMessage());
    }
    if (!Storage::disk('public')->exists($blueprint->file_path)) {
        abort(404, 'Archivo no encontrado');
    }


    $fileName = basename($blueprint->file_path);

    return Storage::disk('public')->download($blueprint->file_path, $fileName);
}

    public function downloadPago(Request $request, Blueprint $blueprint)
    {
        $codigo = $request->input('codigo');

        if ($blueprint->codigo_compra !== $codigo) {
            return back()->with('error', 'Código incorrecto o inválido');
        }

        try {
            Solicitud::create([
                'blueprint_id' => $blueprint->id,
                'tipo_solicitud' => 'descarga_con_codigo',
                'nombre_solicitante' => 'Usuario autenticado con código',
                'mensaje' => 'Descarga validada por código de compra',
                'ip_address' => $request->ip(),
            ]);
        } catch (\Exception $e) {
            \Log::error('Error al registrar solicitud de descarga paga: ' . $e->getMessage());
        }

        $nuevoCodigo = (string) Str::uuid();
        $blueprint->codigo_compra = $nuevoCodigo;
        $blueprint->save();

        Log::info("Código de compra regenerado tras descarga para plano ID {$blueprint->id}", [
            'nuevo_codigo' => $nuevoCodigo
        ]);

        if (!Storage::disk('public')->exists($blueprint->file_path)) {
            abort(404, 'Archivo no encontrado');
        }

        $fileName = basename($blueprint->file_path);
        return Storage::disk('public')->download($blueprint->file_path, $fileName);
    }
}
