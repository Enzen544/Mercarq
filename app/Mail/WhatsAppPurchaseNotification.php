<?php


namespace App\Mail;

use App\Models\Blueprint;
use App\Models\Solicitud; 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request; 

class WhatsAppPurchaseNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $blueprint;
    public $buyerData;

    /**
     * 
     *
     * @return void
     */
    public function __construct($blueprint, $buyerData)
    {
        $this->blueprint = $blueprint;
        $this->buyerData = $buyerData;

        \Log::info('Intentando registrar solicitud de WhatsApp', [
            'blueprint_id' => $this->blueprint->id ?? 'N/A',
            'buyerData' => $this->buyerData
        ]);
        try {
            Solicitud::create([
                'blueprint_id' => $this->blueprint->id ?? null,
                'tipo_solicitud' => 'whatsapp',
                'nombre_solicitante' => $this->buyerData['name'] ?? 'Anónimo',
                'email_solicitante' => $this->buyerData['email'] ?? null,
                'telefono_solicitante' => $this->buyerData['whatsapp'] ?? null,
                'mensaje' => $this->buyerData['message'] ?? null,
                'ip_address' => request()->ip(),
            ]);
             \Log::info('Solicitud de WhatsApp registrada exitosamente');
        } catch (\Exception $e) {
             \Log::error('Error al registrar solicitud de WhatsApp: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
        }
    }

    /**
     * 
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('¡Nueva solicitud de compra para tu plano!')
            ->view('emails.whatsapp-purchase')
            ->with([
                'blueprint' => $this->blueprint,
                'buyer' => $this->buyerData,
                'whatsappLink' => 'https://wa.me/' . str_replace(['+', ' ', '-'], '', $this->buyerData['whatsapp']) . '?text=' . urlencode(
                    "¡Hola {$this->buyerData['name']}! 👋\n\n" .
                    "Vi que te interesa mi plano \"{$this->blueprint->title}\" por \$" . number_format($this->blueprint->price, 0, ',', '.') . ".\n\n" .
                    "¿Cómo te gustaría proceder con el pago?"
                )
            ]);
    }
}