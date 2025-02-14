<?php

namespace App\Mail\Clients;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class SendPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    
     public $client;

    public function __construct($client)
    {
        $this->client=$client;

    }

 
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.client.welcome',
            with: [
                'client' => $this->client,
            ],
        );
    }
}



