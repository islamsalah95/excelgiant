<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewInvoiceOrder implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }


    // public function broadcastOn(): array
    // {
    //     return [
    //         new PrivateChannel('new-invoice-order'),
    //     ];
    // }

    public function broadcastOn(): Channel
    {
        return new Channel('orders');
    }

    // public function broadcastOn()
    // {
    //     return new Channel('notification');
    // }
}
