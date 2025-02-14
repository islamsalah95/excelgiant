<?php

namespace App\Livewire\Notification;

use Livewire\Component;
use Livewire\Attributes\On; 

class ReadNotification extends Component 
{
    public $user;
    public $count;

 
    public function getListeners()
    {
        return [
            "echo:orders,NewInvoiceOrder" => 'notifyNewMessage',
        ];
    }
    
    public function notifyNewMessage()
    {
        
    
        $this->notifyNewOrder();
        $this->dispatch('new-order'); 
    
    }
 
    #[On('delete-notificatshion')] 

    public function notifyNewOrder()
    {
        $this->user = auth()->guard('web')->user();
        $this->count = $this->user ? $this->user->unreadNotifications->count() : 0;
    }

    public function mount()
    {
        $this->notifyNewOrder();

    }
    
    public function readNotification()
    {
        $this->user->unreadNotifications->markAsRead();

    }


    public function render()
    {
        return view('livewire.notification.read-notification');
    }
}
