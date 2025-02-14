<?php
namespace App\Mail\Contacts;


use Illuminate\Mail\Mailable;


class RedirectMessageMail extends Mailable
{
    public $messageContent;

    public function __construct($messageContent)
    {
        $this->messageContent = $messageContent;
    }

    public function build()
    {
        return $this->subject('Redirect to Customer message')
                    ->view('emails.contacts.redirect')
                    ->with('messageContent', $this->messageContent);
    }
}
