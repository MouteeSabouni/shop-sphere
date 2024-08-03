<div>
    <div class="my-4 flex flex-col gap-10">
        <div class="flex gap-10">
            <div class="flex flex-col w-[450px]">
                <img src="{{ $mainImage }}" class="object-contain h-[450px] rounded-xl">
                    <div class="flex items-center w-[450px] mt-4">
                        <div class="flex items-center gap-[10px] w-full">
                            @foreach(array_slice($images->toArray(), $currentIndex, $visibleCount) as $image)
                                <button type="button" wire:click="setMainImage('{{ $image['url'] }}')">
                                    <img  src="{{ $image['url'] }}"
                                    @class([
                                            'w-[140px] transition-all px-1 py-1 h-[140px] object-contain hover:scale-110 hover:opacity-60',
                                            'border border-2 border-blue-500 rounded-xl' => $image['url'] === $mainImage,
                                        ])>
                                </button>
                            @endforeach
                        </div>
                    </div>
                @if($visibleCount <= $images->count())
                    <div class="text-center mt-4 space-x-4">
                        <button wire:click="scrollLeft"
                        @class([
                            'bg-white border border-gray-300 rounded-full p-2 shadow',
                            'opacity-20 cursor-not-allowed' => $currentIndex === 0
                        ])
                        {{ $currentIndex === 0 ? 'disabled' : ''}}
                        >
                            <img src="/images/chevron-left.svg" class="h-6 w-6" />
                        </button>

                        <button wire:click="scrollRight"
                        @class([
                            'bg-white border border-gray-300 rounded-full p-2 shadow',
                            'opacity-20 cursor-not-allowed' => $currentIndex+$visibleCount === $images->count()
                        ])
                        {{ $currentIndex+$visibleCount === $images->count() ? 'disabled' : ''}}
                        >
                            <img src="/images/chevron-right.svg" class="h-6 w-6" />
                        </button>
                    </div>
                @endif
            </div>

            <div class="w-[450px]">
                <div class="flex flex-col gap-3">
                    <div class="flex items-center gap-2">
                        @foreach ($product->categories as $category)
                        <a href="">
                        <div class="px-2 text-sm rounded-xl border border-black text-blue-700 font-bold hover:bg-gray-300 hover:text-black">
                                {{ $category->name }}
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <div class="text-sm w-fit text-blue-900 bg-blue-100 rounded px-2 font-bold text-xs py-0.5">
                        Best seller
                    </div>
                    <a href="" class="text-zinc-500 underline text-sm w-fit">
                        {{ $product->brand->name }}
                    </a>
                    <div class="text-xl font-bold">
                        {{ $product->name }}
                    </div>
                    <div class="flex items-center gap-[0.5px]">
                        <span class="text-sm">
                            {{ $sku->rating() }}
                        </span>
                        <img src="/star-solid.svg" class="w-4 h-4" />
                        <a href="#reviews">
                            <span class="underline text-sm">
                                ({{ $sku->reviews->count() }} reviews)
                            </span>
                        </a>
                    </div>

                    <hr class="mt-3 mb-2">

                    <div class="text-sm">
                        <span class="text-sm font-bold">
                            At a glance
                        </span>
                        <div class="grid grid-cols-3 gap-3 mt-3">
                            <div class="rounded px-3 py-3 bg-blue-100 flex flex-col text-center">
                                <span class="font-bold">
                                    Brand
                                </span>
                                <span>
                                    {{ $product->brand->name }}
                                </span>
                            </div>
                            @if($sku->attributeOptions->count() !== 0)
                                @foreach($sku->attributeOptions as $attributeOption)
                                    @if ($loop->iteration === 5) @break @endif
                                    <div class="rounded px-3 py-3 bg-blue-100 flex flex-col text-center">
                                        <span class="font-bold">
                                            {{ $attributeOption->attribute->name }}
                                        </span>
                                        <span>
                                            {{ $attributeOption->value }}
                                        </span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <hr class="mt-3 mb-2">

                    <div>
                        <span class="text-sm font-bold">
                            General specifications
                        </span>
                        <ul class="text-sm mt-2">
                            <li>
                                <span class="font-bold">Weight: </span>
                                <span>{{ $sku->weight }} g</span>
                            </li>
                            <li>
                                <span class="font-bold">Height: </span>
                                <span>{{ $sku->height }} cm</span>
                            </li>
                            <li>
                                <span class="font-bold">Width: </span>
                                <span>{{ $sku->width }} cm</span>
                            </li>
                            <li>
                                <span class="font-bold">Thickness: </span>
                                <span>{{ $sku->thickness }} cm</span>
                            </li>
                            <li>
                                <span class="font-bold">Material: </span>
                                <span>{{ $product->material }}</span>
                            </li>
                            <li>
                                <span class="font-bold">Manufacturer: </span>
                                <span>{{ $product->manufacturer }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-zinc-100 rounded-xl px-4 py-4 w-[350px] h-fit">
                <div class="flex flex-col gap-3">
                    <div class="flex flex-col gap-[5px]">
                        <div class="flex items-end gap-2">
                            <span class="text-2xl text-green-700 font-bold">Now ${{ number_format($sku->price, 2) }}</span>
                            <div class="flex items-center gap-1">
                                <span class="text-sm mb-0.5 text-gray-500 line-through">${{ number_format($sku->price*1.2, 2) }}</span>
                                <x-products.show.pricing />
                            </div>
                        </div>
                        <div class="flex items-center gap-1">
                            <div class="px-2 py-1 text-xs font-bold text-green-700 bg-emerald-100 rounded-lg">
                                You save
                            </div>
                            <div class="text-green-700 font-bold text-sm">
                                ${{ number_format($sku->price*1.2 - $sku->price, 2) }}
                            </div>
                        </div>
                        <div class="flex items-center gap-1">
                            <img src="/images/roundReturn.svg" class="w-4 h-4 text-blue-500">
                            <span class="text-xs">Free 30-day returns</span>
                        </div>
                    </div>
                    @if($sku->cartedBy->pluck('id')->contains(auth()->id()))
                    <div class="flex justify-between items-center gap-4 bg-blue-600 rounded-full py-1.5 px-1.5">
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
                    @else
                        <button wire:click="addToCart({{$sku->id}})">
                            <div class="flex flex-col items-center py-2 bg-blue-600 rounded-full text-white font-bold text-sm">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                    </svg>
                                    <span>Add to cart</span>
                                </div>
                            </div>
                        </button>
                    @endif

                    <hr>

                    <x-products.show.gifting />

                    <hr>

                    <div class="flex flex-col gap-1">
                        <div class="text-sm">
                            <span>See more products from</span>
                            <a href="" class="text-gray-500 underline">
                                {{ $product->brand->name }}
                            </a>
                        </div>

                        <div class="text-sm">
                            <span>See more products from</span>
                            <a href="" class="text-gray-500 underline">
                                {{ $product->seller->fullName() }}
                            </a>
                        </div>
                    </div>
                    @if($sku->favoritedBy->pluck('id')->contains(auth()->id()))
                    <button type="button" wire:click="unfavorite">
                        <div class="flex flex-col items-center py-2 bg-blue-600 rounded-full text-white font-bold text-sm">
                            <div class="flex gap-1 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[17px] w-[17px]" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Remove from favorites</span>
                            </div>
                        </div>
                    </button>
                    @else
                    <button type="button" wire:click="favorite">
                        <div class="flex flex-col items-center py-2 bg-blue-600 rounded-full text-white font-bold text-sm">
                                <div class="flex gap-1 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-[17px] w-[17px]" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Add to favorites</span>
                                </div>
                            </div>
                        </button>
                    @endif

                    <hr>

                    <div class="flex items-center gap-2">
                        <div class="w-1/3 flex flex-col py-2 px-2 items-center bg-white border border-black rounded-xl">
                            <img src="/images/shipping.png" class="w-10 h-10">
                            <span class="text-[12px]">Shipping</span>
                            <span class="text-[10px]">Arrives in 3-7 days</span>
                        </div>

                        <div class="w-1/3 flex flex-col py-2 px-2 items-center bg-white border border-black rounded-xl">
                            <img src="/images/pickup.png" class="w-10 h-10">
                            <span class="text-[12px]">Pickup</span>
                            <span class="text-[10px]">Arrives in 2-3 days</span>
                        </div>

                        <div class="w-1/3 flex flex-col py-2 px-2 items-center bg-white border border-black rounded-xl">
                            <img src="/images/delivery.png" class="w-10 h-10">
                            <span class="text-[12px]">Home Delivery</span>
                            <span class="text-[10px]">Arrives tomorrow</span>
                        </div>
                    </div>

                    <hr>

                    <div class="flex items-center gap-1">
                        <img src="/images/logo.png" class="w-4 h-4 text-blue-500">
                        <span class="text-xs">Shipped and saled by ShopSphere.com</span>
                    </div>

                    <hr>

                    <div class="flex flex-col gap-1">
                        <span class="font-bold text-xs">Return policy</span>
                        <span class="text-xs">Most items sold & shipped by ShopSphere can be returned for free, either to a store or by mail. ShopSphere handles the delivery, returns and customer service for these items. Items purchased in store or items picked up or delivered from a store can only be returned to a store.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col w-full gap-2" id="reviews">
        <span class="font-bold">
            Reviews
        </span>
        <span class="text-sm">
            Click on a review to see its details.
        </span>
        <div class="grid grid-cols-3 gap-4 py-2">
            @foreach($sku->reviews as $review)
                <x-dialog wire:model="showModal">
                    <x-dialog.open>
                        <button class="w-full">
                            <div class="flex flex-col justify-between border border-2 rounded-2xl px-3 py-3 gap-4 h-fit hover:border hover:border-2 hover:border-blue-600 rounded-2xl transition-all duration-300">
                                <div class="flex justify-between">
                                    <div class="flex items-center">
                                        @for ($i = $review->rating; $i > 0; $i--)
                                            <img src="/star-solid.svg" class="w-3 h-3">
                                        @endfor
                                    </div>

                                    <span class="font-medium text-[11px]">
                                        {{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}
                                    </span>
                                </div>
                            </div>
                        </button>
                    </x-dialog.open>

                    <x-dialog.panel>
                        <h2 class="text-xl font-bold text-slate-900">{{$review->rating}}-star review</h2>

                        <div class="flex items-center mt-2">
                            @for ($i = $review->rating; $i > 0; $i--)
                                <img src="/star-solid.svg" class="w-5 h-5">
                            @endfor
                        </div>

                        <div class="mt-5 text-sm text-gray-600">
                            <h3  class="text-sm">
                                {{ $review->comment }}
                            </h3>
                            <div class="flex gap-1 mt-4">
                                <span class="text-gray-600 font-medium italic">
                                    {{ $review->user->fullName() }}
                                </span>
                                <span class="italic">on</span>
                                <span class="text-gray-600 font-medium italic">
                                    {{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}
                                </span>
                            </div>
                        </div>
                    </x-dialog.panel>
                </x-dialog>
            @endforeach
        </div>
    </div>
</div>

