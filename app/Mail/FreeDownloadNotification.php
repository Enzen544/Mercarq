<?php


namespace App\Mail;


use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Models\Blueprint;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log; 

class FreeDownloadOwnerNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $blueprint;
    public $downloaderData;

    public function __construct(Blueprint $blueprint, array $downloaderData)
    {
        $this->blueprint = $blueprint;
        $this->downloaderData = $downloaderData;

       
        Log::info('Intentando registrar solicitud de descarga gratuita (para propietario)', [
            'blueprint_id' => $this->blueprint->id ?? 'N/A',
            'downloaderData' => $this->downloaderData
        ]);
        try {
            Solicitud::create([
                'blueprint_id' => $this->blueprint->id ?? null,
                'tipo_solicitud' => 'descarga_gratuita',
                'nombre_solicitante' => $this->downloaderData['name'] ?? 'Anónimo',
                'email_solicitante' => $this->downloaderData['email'] ?? null,
                'telefono_solicitante' => null, 
                'mensaje' => null, 
                'ip_address' => request()->ip(), 
            ]);
            Log::info('Solicitud de descarga gratuita (para propietario) registrada exitosamente');
        } catch (\Exception $e) {
            Log::error('Error al registrar solicitud de descarga gratuita (para propietario): ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
        }
    }

    public function build()
    {
        return $this->subject('Descarga gratuita de tu plano: ' . $this->blueprint->title)
            ->view('emails.free-download-owner-notification')
            ->with([
                'blueprint' => $this->blueprint,
                'downloader' => $this->downloaderData,
            ]);
    }
}