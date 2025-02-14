<div class="ud-cart-offcanvas count-{{ is_countable($items) ? count($items) : 0 }}" id="cart__offcanvas">
    <div class="offcanvas-title d-flex justify-content-between align-items-center">
        <h3>
            {{ __('frontend/cart.offcanvas.title') }}
        </h3>
        <button class="close-cart-offcanvas" data-offcanvas-cart="true">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    <div class="offcanvas-content">
        @forelse ($items as $index => $item)
            <div class="item" id="item-{{ $item['id'] }}">
                <div class="heading">
                    <span class="itemName">{{ $item['name'] }}</span>
                    <span class="itemDelete" wire:confirm="{{ __('advantages/index.delete_confirm') }}" wire:click="delete('{{ $item['id'] }}')">
                        <i class="fa-regular fa-trash-can"></i>
                    </span>
                </div>
                {{--<div class="variants">--}}
                {{--    <span class="itemVariant">Empolyees: 0 - 10</span> |--}}
                {{--    <span class="itemVariant">Transactions: 35</span>--}}
                {{--</div>--}}
                <div class="price">
                    <span class="itemPrice">
                        {{ number_format($item['price'], 2) }} {{ __('advantages/index.currency')}}
                    </span>
                </div>
                {{--<small class="itemPeriod">Yearly</small>--}}
            </div>
        @empty
            <div class="item-empty">
               <p>{{ __('No items in the cart.') }}</p>
            </div>
        @endforelse
    </div>

    <div class="offcanvas-action">
        <div class="d-flex flex-column gap-1 mb-4">
             <span class="h5">{{ __('Total Price:') }}
                 <span class=" fw-bold">{{ number_format($totalPrice, 2) }} {{ __('advantages/index.currency') }}</span>
             </span>
            @if ($items->isNotEmpty())
                <button class="btn btn-danger btn-sm" type="button"
                        wire:confirm="{{ __('advantages/index.delete_confirm') }}" wire:click="clearCart()">
                    <i class="ti ti-trash"></i> {{ __('frontend/cart.clear_cart') }}
                </button>
            @endif
        </div>

        <a href="{{route('checkout.index')}}" class="btn btn-primary btn-block w-100">
            {{ __('frontend/cart.offcanvas.checkout') }}
        </a>
    </div>
</div>
<div class="cart-offcanvas__backdrop"></div>

