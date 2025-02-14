<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;


class InvoiceOrder extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $invoiceOrder;
    public function __construct($invoiceOrder)
    {
        $this->invoiceOrder = $invoiceOrder;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }



    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id'=>$this->invoiceOrder['id'] ,
            'cart_data'=>$this->invoiceOrder['cart_data'] ,
            'client_id'=>$this->invoiceOrder['client_id'],
            'price'=>$this->invoiceOrder['price'],
            'adress'=>$this->invoiceOrder['adress'],
            'phone'=>$this->invoiceOrder['phone'],
            'taxes'=>$this->invoiceOrder['taxes'],
        ];
    }
}
