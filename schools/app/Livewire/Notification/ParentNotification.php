<?php

namespace App\Livewire\Notification;

use Livewire\Component;
use Livewire\Attributes\On; 

class ParentNotification extends Component
{

    #[On('delete-notificatshion')] 

    public function render()
    {
        return view('livewire.notification.parent-notification');
    }
}
