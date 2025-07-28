<?php
// app/Mail/FreeDownloadOwnerNotification.php

namespace App\Mail;

use App\Models\Blueprint;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FreeDownloadOwnerNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $blueprint;
    public $downloaderData;

    public function __construct(Blueprint $blueprint, array $downloaderData)
    {
        $this->blueprint = $blueprint;
        $this->downloaderData = $downloaderData;
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