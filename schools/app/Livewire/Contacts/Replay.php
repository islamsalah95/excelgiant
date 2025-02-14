<?php

namespace App\Livewire\Contacts;

use Livewire\Component;
use App\Models\Contacts;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contacts\ReplyMessageMail;


class Replay extends Component
{
    public $contact;

    public $message;


    protected $rules = [
       'message' => 'required|string',
   ];

    public function sendReply()
    {
        $this->validate();
    
        $contact = $this->contact;
    
        if ($contact) {
            $messageContent = [
                'name' => $contact->name,
                'replyMessage' => $this->message,
            ];
    
            Mail::to($contact->email)->send(new ReplyMessageMail($messageContent));
            session()->flash('message', __('Message sent successfully!'));
    
            session()->flash('message', __('share.message.create'));

            return redirectLive('contacts');
        } else {
            $this->dispatchBrowserEvent('notify', ['message' => __('Contact not found.'), 'type' => 'error']);
        }
    }

    public function redirectMail($contactId, $replyMessage)
    {
        $contact = Contacts::find($contactId);
    
        if ($contact) {
            $messageContent = [
                'name' => $contact->name,
                'replyMessage' => $replyMessage,
            ];
    
            Mail::to($contact->email)->send(new ReplyMessageMail($messageContent));
    
            $this->dispatch('notify', message: __('Message sent successfully.'));
    
            // Redirect to a specific page
            return redirect()->route('contacts.index');
        } else {
            $this->dispatch('notify', message: __('Contact not found.'), type: 'error');
        }
    }

    public function render()
    {
        $this->contact=Contacts::find($this->contact);
        return view('livewire.contacts.replay',['contact'=>$this->contact]);
    }
}
