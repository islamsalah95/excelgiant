<?php

namespace App\Livewire\Contacts;

use Livewire\Component;
use App\Models\Contacts;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contacts\RedirectMessageMail;

class Redirect extends Component
{
    public $contact;

    public $message;
    public $email;

    protected $rules = [
       'message' => 'required|string',
       'email' => 'required|email',

   ];


    public function redirectMail()
    {
        $contact = $this->contact;
    
        if ($contact) {
            $messageContent = [
                'name' => $contact->name,
                'message' => $contact->message,
                'replyMessage' => $this->message,
            ];
    
            Mail::to($this->email)->send(new RedirectMessageMail($messageContent));
    
            session()->flash('message', __('share.message.create'));

            return redirectLive('contacts');
        } else {
            return redirectLive('contacts');
        }
    }
    public function render()
    {
        $this->contact=Contacts::find($this->contact);
        return view('livewire.contacts.redirect',['contact'=>$this->contact]);
    }
}
