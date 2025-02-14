<?php

namespace App\View\Components\Frontend\Share;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CartOffcanvas extends Component
{

    public $items = [];
    public $userId;
    public $totalPrice = 0;

    public function __construct()
    {
        $this->userId = auth()->guard('employ')->user()->id;
        
        $this->items = \Cart::session($this->userId)->getContent();
        $this->totalPrice = \Cart::session($this->userId)->getTotal();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.share.cart-offcanvas',[
            'items' => $this->items,
            'totalPrice' => $this->totalPrice
        ]);

    }
}
