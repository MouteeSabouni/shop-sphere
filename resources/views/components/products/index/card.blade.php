@props(['product', 'sku'])
<div @class([
    'flex flex-col',
    'opacity-50' => $sku->status === 0
    ])
>
    <a href="/products/{{ $product->slug }}/{{ $sku->code }}">
        <img src="{{ $sku->images->first()->url }}" class="object-contain w-[325px] h-[325px] rounded-xl hover:animate-pulse">
    </a>
    <div class="p-4 rounded-xl">
        <div class="flex items-center justify-between">
            <p class="tracking-tight text-green-600 font-bold text-2xl">${{ $sku->price }}</p>
            @auth
                @if($sku->status === 0)
                    <div class="text-sm bg-gray-200 px-3 py-1 rounded-full font-bold">
                        OUT OF STOCK
                    </div>

                @elseif(! $sku->cartedBy->pluck('id')->contains(auth()->id()))
                    <div>
                        <button wire:click="addToCart({{$sku->id}})" class="bottom-[180px] left-28 flex items-center px-3 py-1.5 rounded-3xl bg-blue-600 text-white">
                            <img src="/images/button-icons/plus.svg" class="size-5" />
                            <span class="text-[15px] font-medium pl-0.5 pr-1">Add</span>
                        </button>
                    </div>
                @else
                    <div class="flex items-center gap-4 bg-blue-600 rounded-full py-1 px-1.5">
                        <button wire:click.throttle="removeFromCart({{$sku->id}})" class="px-0.5 py-0.5 rounded-full hover:bg-blue-400 text-white">
                            <img src="/images/button-icons/minus.svg" class="size-5" />
                        </button>

                        <span class="text-white font-medium">
                            {{ auth()->user()->itemsInCart($sku) }}
                        </span>

                        @if(auth()->user()->canAddMore($sku))
                            <button wire:click.throttle="addToCart({{$sku->id}})" class="px-0.5 py-0.5 rounded-full hover:bg-blue-400 text-white">
                                <img src="/images/button-icons/plus.svg" class="size-5" />
                            </button>
                        @else
                        <button class="px-0.5 py-0.5 rounded-full text-white cursor-not-allowed opacity-50" disabled>
                            <img src="/images/button-icons/plus.svg" class="size-5" />
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

                @auth
                    @if($sku->favoritedBy->pluck('id')->contains(auth()->id()))
                        <button type="button" wire:click="unfavorite({{$sku->id}})" class="hover:scale-[1.35]">
                            <img src="/images/button-icons/unfavorite.svg" class="h-6 w-6">
                        </button>
                    @else
                        <button type="button" wire:click="favorite({{$sku->id}})" class="hover:scale-[1.35]">
                            <img src="/images/button-icons/favorite.svg" class="h-6 w-6">
                        </button>
                    @endif
                @endauth
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
</div>
