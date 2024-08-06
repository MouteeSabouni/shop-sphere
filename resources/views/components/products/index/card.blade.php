@props(['product', 'sku'])

<div class="p-4 rounded-xl">
    <div class="flex items-center justify-between">
        <p class="tracking-tight text-green-600 font-bold text-2xl">${{ $sku->price }}</p>
        @auth
            @if(! $sku->cartedBy->pluck('id')->contains(auth()->id()))
                <div>
                    <button wire:click="addToCart({{$sku->id}})" class="bottom-[180px] left-28 flex items-center px-3 py-1.5 rounded-3xl bg-blue-600 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>

                        <span class="text-[15px] font-medium pl-0.5 pr-1">Add</span>
                    </button>
                </div>
            @else
                <div class="flex items-center gap-4 bg-blue-600 rounded-full py-1 px-1.5">
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

    <span class="text-sm underline">
        <a href="/brands/{{ $product->brand->slug }}">
            {{ $product->brand->name }}
        </a>
    </span>

    <div class="space-y-1.5">
        <h3 class="text-xl font-bold transition-colors duration-300">
            {{ str($product->name)->words(8) }}
        </h3>
        @if(count($product->categories) !== 0)
            <div class="flex-none items-center">
                @foreach($product->categories as $category)
                    <button class="my-[3px] bg-blue-200 hover:opacity-60 rounded-xl py-1 font-bold transition-all duration-300 text-xs">
                        <a href="/categories/{{ $category->slug }}" class="px-3">
                            {{ $category->name }}
                        </a>
                    </button>
                @endforeach
            </div>
        @endif
        <div class="flex justify-between mt-2">
            <x-products.rating :$sku />

            @if($sku->favoritedBy->pluck('id')->contains(auth()->id()))
                <button type="button" wire:click="unfavorite({{$sku->id}})" class="hover:scale-[1.35]">
                    <img src="/images/unfavorite.svg" class="h-6 w-6">
                </button>
            @else
                <button type="button" wire:click="favorite({{$sku->id}})" class="hover:scale-[1.35]">
                    <img src="/images/favorite.svg" class="h-6 w-6">
                </button>
            @endif
        </div>

        <div class="flex gap-1 text-[13px]">
            <span>by</span>
            <a href="/users/{{ $product->seller->username }}" class="underline">
                {{ $product->seller->first_name }}
            </a>
            <span>{{ $product->created_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
