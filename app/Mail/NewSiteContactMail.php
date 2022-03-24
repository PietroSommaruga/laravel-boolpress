<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewSiteContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $newContactData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_newContactData)
    {
        $this->newContactData = $_newContactData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Nuova richiesta contatti da " . $this->newContactData->name)
        ->view('mails.newSiteContact');
    }
}
