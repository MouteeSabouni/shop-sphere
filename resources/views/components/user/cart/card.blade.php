@props(['product', 'sku'])

<div class="flex flex-col justify-between gap-y-1 p-4 rounded-xl w-full">
    <div class="space-y-1">
        <div class="flex justify-between gap-20">
            <h3 class="text-lg font-bold transition-colors duration-300 pr-1">
                {{ $product->name }}
            </h3>
            <p class="tracking-tight text-green-600 font-bold text-xl">${{ $sku->price }}</p>
        </div>

        <a href="/brands/{{ $product->brand->slug }}" class="text-sm underline">
            {{ $product->brand->name }}
        </a>

        @if(count($product->categories) !== 0)
            <div class="flex-none items-center">
                @foreach($product->categories as $category)
                    <button class="my-[3px] bg-blue-200 hover:opacity-70 rounded-xl py-1 font-bold transition-all duration-300 text-[11px]">
                        <a href="/categories/{{ $category->slug }}" class="px-2.5">
                            {{ $category->name }}
                        </a>
                    </button>
                @endforeach
            </div>
        @endif
    </div>

    <div class="flex justify-between items-center">
        <div class="flex gap-2 text-[13px]">
            Created {{ $sku->cart->where('user_id', auth()->id())->first()->created_at->diffForHumans() }}
        </div>

        <div class="flex items-center gap-3 justify-end">
            <div>
                <button class="underline text-sm" wire:click="removeFromCart({{$sku->id}}, true)" wire:confirm="Remove this product from cart entirely?">
                    Remove from cart
                </button>
            </div>

            <div class="flex items-center border border-2 border-gray-300 gap-4 rounded-full py-1 px-1.5 scale-90">
                <button wire:click.throttle="removeFromCart({{$sku->id}})" class="px-0.5 py-0.5 rounded-full hover:bg-gray-200 text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                    </svg>
                </button>

                <span class="text-black font-medium">
                    {{ auth()->user()->itemsInCart($sku) }}
                </span>

                @if(auth()->user()->canAddMore($sku))
                    <button wire:click.throttle="addToCart({{$sku->id}})" class="px-0.5 py-0.5 rounded-full hover:bg-gray-200 text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                @else
                    <button class="px-0.5 py-0.5 rounded-full text-black cursor-not-allowed opacity-20" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
