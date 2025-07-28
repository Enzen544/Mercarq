<?php
// app/Mail/WhatsAppPurchaseNotification.php

namespace App\Mail;

use App\Models\Blueprint;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WhatsAppPurchaseNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $blueprint;
    public $buyerData;

    public function __construct(Blueprint $blueprint, array $buyerData)
    {
        $this->blueprint = $blueprint;
        $this->buyerData = $buyerData;
    }

    public function build()
    {
        return $this->subject('¡Nueva solicitud de compra para tu plano!')
            ->view('emails.whatsapp-purchase')
            ->with([
                'blueprint' => $this->blueprint,
                'buyer' => $this->buyerData,
                'whatsappLink' => 'https://wa.me/' . str_replace(['+', ' ', '-'], '', $this->buyerData['whatsapp']) . '?text=' . urlencode(
                    "¡Hola {$this->buyerData['name']}! 👋\n\n" .
                    "Vi que te interesa mi plano \"{$this->blueprint->title}\" por \${$this->blueprint->price}.\n\n" .
                    "¿Cómo te gustaría proceder con el pago?"
                )
            ]);
    }
}