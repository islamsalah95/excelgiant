<?php

namespace App\Livewire\Notification;

use Livewire\Component;
use App\Models\Checkout;
use Livewire\Attributes\On; 

class Index extends Component
{

    public $user;
    public $notifications;
    public $classBasenames;

    public $invoiceNotifications ;

    #[On('new-order')] 
    #[On('delete-notificatshion')] 

    public function loadNotification()
    {

        $this->user = auth()->user();
        $this->notifications = $this->user->notifications;


        foreach ($this->notifications as $key => $notification) {
            $this->classBasenames[class_basename($notification->type).'-'.$key] = $notification->data;
        }

        if($this->classBasenames ){
            foreach ($this->classBasenames as $key => $value) {
                if (str_contains($key, "InvoiceOrder")) {
                    $this->invoiceNotifications[$key] = Checkout::find($value['id']);
                }
            }
        }

    }




    public function mount()
    {
        $this->loadNotification();

    }

    public function render()
    {
        return view('livewire.notification.index');
    }
}
