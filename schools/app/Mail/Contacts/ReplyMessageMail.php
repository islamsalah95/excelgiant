<?php
namespace App\Mail\Contacts;


use Illuminate\Mail\Mailable;


class ReplyMessageMail extends Mailable
{
    public $messageContent;

    public function __construct($messageContent)
    {
        $this->messageContent = $messageContent;
    }

    public function build()
    {
        return $this->subject('Reply to Your Message')
                    ->view('emails.contacts.reply')
                    ->with('messageContent', $this->messageContent);
    }
}
