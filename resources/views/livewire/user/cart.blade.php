<div class="my-[10px] mx-16">
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    @if($cartItems->count() > 0)
        <div class="flex items-center gap-1 pb-4">
            <span class="text-xl font-bold">Cart</span>
            @if(auth()->user()->itemsInCart() === 1)
                <span class="text-lg">({{ auth()->user()->itemsInCart() }} item)</span>
            @else
                <span class="text-lg">({{ auth()->user()->itemsInCart() }} items)</span>
            @endif
        </div>
        <div class="flex gap-x-4">
            <div class="w-2/3">
                <div class="grid grid-cols-1 gap-6">
                    @foreach($cartItems as $cartItem)
                        <div class="flex items-center border border-2 rounded-3xl">
                            <a wire:navigate.hover href="/products/{{ $cartItem->sku->product->slug }}/{{ $cartItem->sku->code }}">
                                <img src="{{ $cartItem->sku->images->first()->url }}" class="object-contain px-4 w-[150px] h-[150px] rounded-xl hover:animate-pulse">
                            </a>
                            <x-user.cart.card wire:key="{{$cartItem->sku->id}}" :sku="$cartItem->sku" :product="$cartItem->sku->product" />
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="w-1/3 sticky top-20 self-start">
                <div class="border border-2 rounded-3xl px-3 py-4">
                    <div class="flex flex-col">
                        <div class="flex flex-col items-center gap-2">
                            <a href="/user/checkout" class="flex flex-col items-center w-full">
                                <button class="text-[15px] font-semibold w-3/4 rounded-full hover:bg-blue-400 text-white bg-blue-600 rounded-full py-1.5 px-1.5">
                                    Continute to checkout
                                </button>
                            </a>
                            <span class="text-[13px]">
                                We hope you had the best shopping experience.
                            </span>
                        </div>
                    </div>

                    <hr class="my-3">

                    <x-user.cart.details :$cartItems />

                    <hr class="my-3">

                    <div class="text-[13px]">
                        <div class="flex flex-col gap-1">
                            <div class="flex justify-between">
                                <span>Shipping</span>
                                <span class="text-green-600 font-medium">Free</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Taxes</span>
                                <span>Calculated at checkout</span>
                            </div>
                        </div>
                    </div>

                    <hr class="my-3">

                    <div class="flex flex-col items-center text-[13px]">
                        <span>Pay in installments?</span>
                        <div class="flex text-[13px] gap-1">
                            <span>as low as</span>
                            <span class="font-bold">${{ number_format(auth()->user()->cartTotal()/36, 2) }}/mo</span>
                            <span>with</span>
                            <img src="/images/affirm.png" class="h-[14.5px]">
                        </div>
                    </div>
                </div>

                <div class="flex items-center border border-2 shadow-md rounded-2xl mt-4 pr-10 pl-3 gap-2 py-2">
                    <img src="/images/logo.png" class="h-5 w-5">
                    <span class="text-xs font-semibold">
                        Become a member to get free same-day delivery, discounts, $ more!
                    </span>
                </div>

                <div class="border border-2 rounded-2xl shadow-md mt-4 px-4 py-2">
                    <x-gifting />
                </div>
            </div>
        </div>
    @else
        <x-user.cart.empty />
    @endif
</div>
