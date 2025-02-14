<?php
namespace App\Mail\Admin;

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
    
     public $password;
     public $admin;

    public function __construct($password,$admin)
    {
        $this->password=$password;
        $this->admin=$admin;

    }

 
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin.welcome',
            with: [
                'password' => $this->password,
                'admin' => $this->admin,
            ],
        );
    }
}
