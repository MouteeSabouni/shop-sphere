@props(['product', 'sku'])

<div class="p-4 rounded-xl">
    <div class="flex items-center justify-between">
        <p class="tracking-tight text-green-600 font-bold text-xl">${{ $sku->price }}</p>
        @auth
            @if(! $sku->cartedBy->pluck('id')->contains(auth()->id()))
                <div>
                    <button wire:click="addToCart({{$sku->id}})" class="bottom-[180px] left-28 flex items-center px-2.5 py-1 rounded-3xl bg-blue-600 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>

                        <span class="text-[13.5px] font-medium pl-0.5 pr-1">Add</span>
                    </button>
                </div>
            @else
                <div class="flex items-center gap-4 bg-blue-600 rounded-full py-0.5 px-1">
                    <button wire:click.throttle="removeFromCart({{$sku->id}})" class="px-0.5 py-0.5 rounded-full hover:bg-blue-400 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                        </svg>
                    </button>

                    <span class="text-white font-medium text-[15px]">
                        {{ auth()->user()->itemsInCart($sku) }}
                    </span>

                    @if(auth()->user()->canAddMore($sku))
                        <button wire:click.throttle="addToCart({{$sku->id}})" class="px-0.5 py-0.5 rounded-full hover:bg-blue-400 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    @else
                    <button class="px-0.5 py-0.5 rounded-full text-white cursor-not-allowed opacity-50" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                    @endif
                </div>
            @endif
        @endauth
    </div>
    <div class="space-y-2 mt-2">
        <h3 class="text-xl font-bold transition-colors duration-300">
            {{ str($product->name)->words(8) }}
        </h3>

        <div class="text-[13px] flex items-center justify-between">
            <x-products.rating :$sku />

            <div>
                <button type="button" class="w-full" wire:click="unfavorite({{$sku->id}})" wire:confirm="Remove this item from favorite?">
                    <img src="/images/trash.svg" class="w-5 h-5" alt="Remove from favorite">
                </button>
            </div>
        </div>
    </div>
</div>
