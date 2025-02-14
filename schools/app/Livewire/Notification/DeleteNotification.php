<?php

namespace App\Livewire\Notification;

use Livewire\Component;

class DeleteNotification extends Component
{

    public $user;


    public function mount()
    {
        $this->user = auth()->user();

    }


    public function deleteNotification()
    {
        $this->user->notifications()->delete();
        $this->dispatch('delete-notificatshion'); 

    }
    
    public function render()
    {
        return view('livewire.notification.delete-notification');
    }
}
