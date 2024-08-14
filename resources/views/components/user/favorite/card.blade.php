@props(['product', 'sku'])
<div @class([
    'flex flex-col',
    'opacity-50' => $sku->status === 0
    ])
>
    <a wire:navigate.hover href="/products/{{ $sku->product->slug }}/{{ $sku->code }}">
        <img src="{{ $sku->images->first()->url }}" class="object-contain w-[200px] h-[200px] rounded-xl hover:animate-pulse">
    </a>

    <div class="p-4 rounded-xl">
        <div class="flex items-center justify-between">
            <p class="tracking-tight text-green-600 font-bold text-xl">${{ $sku->price }}</p>
            @auth
                @if(! $sku->cartedBy->pluck('id')->contains(auth()->id()) && $sku->status === 1)
                    <div>
                        <button wire:click="addToCart({{$sku->id}})" class="bottom-[180px] left-28 flex items-center px-2.5 py-1 rounded-3xl bg-blue-600 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>

                            <span class="text-[13.5px] font-medium pl-0.5 pr-1">Add</span>
                        </button>
                    </div>
                @elseif($sku->status === 1)
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
            @if($sku->status === 0)
                <div class="text-sm font-medium bg-gray-200 px-3 py-0.5 mt-2 w-fit rounded-full">
                    OUT OF STOCK
                </div>
            @endif
            <h3 class="text-lg font-bold transition-colors duration-300">
                {{ str($product->name)->words(8) }}
            </h3>

            <div class="text-[13px] flex items-center justify-between">
                <x-products.rating :$sku />

                <div>
                    <button type="button" class="w-full" wire:click="unfavorite({{$sku->id}})" wire:confirm="Remove this item from favorite?">
                        <img src="/images/button-icons/trash.svg" class="w-5 h-5" alt="Remove from favorite">
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
