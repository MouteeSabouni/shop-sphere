@props(['product', 'sku'])

<div class="p-4 rounded-xl">
    <div class="flex items-center justify-between">
        <p class="tracking-tight text-green-600 font-bold text-2xl">${{ $sku->price }}</p>
        @auth
            @if(! $sku->cartedBy->pluck('id')->contains(auth()->id()))
                <div>
                    <button wire:click="addToCart({{$sku->id}})" class="bottom-[180px] left-28 flex items-center px-3 py-2 rounded-3xl bg-blue-600 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>

                        <span class="text-[15px] font-medium pl-0.5 pr-1">Add</span>
                    </button>
                </div>
            @else
                <div class="flex items-center gap-4 bg-blue-600 rounded-full py-1.5 px-1.5">
                    <button wire:click.throttle="removeFromCart({{$sku->id}})" class="px-0.5 py-0.5 rounded-full hover:bg-blue-400 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                        </svg>
                    </button>

                    <span class="text-white font-medium">
                        {{ auth()->user()->itemsInCart($sku) }}
                    </span>

                    @if(auth()->user()->canAddMore($sku))
                        <button wire:click.throttle="addToCart({{$sku->id}})" class="px-0.5 py-0.5 rounded-full hover:bg-blue-400 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    @else
                    <button class="px-0.5 py-0.5 rounded-full text-white cursor-not-allowed" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                    @endif
                </div>
            @endif
        @endauth
    </div>
    <div class="space-y-3 mt-2">
        <h3 class="text-xl font-bold transition-colors duration-300">
            {{ str($product->name)->words(8) }}
        </h3>
        @if(count($product->categories) !== 0)
            <div class="flex-1">
                @foreach($product->categories as $category)
                <a href="/categories/{{ strtolower($category->name) }}" class = "bg-blue-200 hover:opacity-70 hover:py-2 rounded-xl font-bold transition-all duration-300 mr-1.5 px-3 py-1 text-xs">
                    {{ ucwords($category->name) }}
                </a>
                @endforeach
            </div>
        @endif
        <div class="flex justify-between mt-2">
            <div class="text-[13px] flex items-center">
                <p>
                    {{ $sku->rating()}}
                </p>
                <img class="h-5 w-5" src="/star-solid.svg" />
                <a class="underline" href="/products/{{ $product->slug }}/{{ $sku->code }}/#reviews">
                    ({{$sku->reviews->count()}} reviews)
                </a>
            </div>
            <div class="text-[13px]">
                Published {{ $product->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
</div>
