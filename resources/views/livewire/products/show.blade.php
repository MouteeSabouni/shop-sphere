<div class="mx-10 my-4">
    <x-slot:title>
        ShopSphere — {{ $product->name }}
    </x-slot:title>
    <div class="my-4 flex flex-col gap-10">
        <div class="flex gap-10">
            <div class="flex flex-col w-[450px]">
                <img src="{{ $mainImage }}" class="object-contain h-[450px] rounded-xl">
                    <div class="flex items-center w-[450px] mt-4">
                        <div class="flex items-center gap-[10px] w-full">
                            @foreach(array_slice($images->toArray(), $currentIndex, $visibleCount) as $image)
                                <button type="button" wire:click="setMainImage('{{ $image['url'] }}')">
                                    <img  src="{{ $image['url'] }}" @class([
                                            'w-[140px] transition-all px-1 py-1 h-[140px] object-contain hover:scale-110 hover:opacity-60',
                                            'border border-2 border-blue-500 rounded-xl' => $image['url'] === $mainImage,
                                        ])
                                    >
                                </button>
                            @endforeach
                        </div>
                    </div>
                @if($visibleCount <= $images->count())
                    <div class="text-center mt-4 space-x-4">
                        <button wire:click="scrollLeft(1)"
                        @class([
                            'bg-white border border-gray-300 rounded-full p-2 shadow',
                            'opacity-20 cursor-not-allowed' => $currentIndex === 0
                        ])
                        {{ $currentIndex === 0 ? 'disabled' : ''}}
                        >
                            <img src="/images/chevron-left.svg" class="h-6 w-6" />
                        </button>

                        <button wire:click="scrollRight(1)"
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
                <div class="flex flex-col">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col">
                            <div class="text-sm w-fit text-blue-900 bg-blue-100 rounded px-2 font-bold text-xs py-0.5">
                                Best seller
                            </div>
                            <a href="" class="my-1.5 text-gray-500 underline text-sm w-fit">{{ $product->brand->name }}</a>
                        </div>

                        <div x-cloak x-show="$wire.reviewSubmitted"
                            x-transition.out.opacity.duration.2000ms
                            x-effect="if($wire.reviewSubmitted) setTimeout(() => $wire.reviewSubmitted = false, 3000)"
                            class="flex gap-1 items-center bg-green-500 text-white rounded-full px-4 h-fit py-2 text-sm font-medium">
                            <span>Product rated!</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>

                    @if($sku->status === 0)
                        <div class="text-red-700 font-bold px-2 py-1 rounded-xl bg-red-100 w-fit">OUT OF STOCK</div>
                    @endif

                    <div class="text-xl font-bold">{{ $product->name }}</div>

                    <div class="flex items-center gap-2 my-2">
                        @foreach ($product->categories as $category)
                        <a href="/categories/{{$category->slug}}">
                        <div class="px-2 text-sm rounded-xl border border-black text-blue-700 font-bold hover:bg-gray-300 hover:text-black">
                                {{ $category->name }}
                            </div>
                        </a>
                        @endforeach
                    </div>

                    <x-products.rating :$sku />

                    <div class="flex justify-between items-end">
                        <div class="text-sm">
                            <span>Added by</span>
                            <a href="/users/{{ $product->seller->username }}" class="text-gray-500 text-sm underline">{{ $product->seller->fullName() }}</a>
                        </div>
                        @auth
                            @if(auth()->user()->hasOrdered($sku->id) && !auth()->user()->hasRated($sku->id))
                                <x-products.show.rate :$sku :$rating />
                            @endif
                        @endauth
                    </div>

                    <hr class="my-2">

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

                    <hr class="my-2">

                    <div>
                        <span class="text-sm font-bold">
                            General specifications
                        </span>
                        <ul class="text-sm">
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
                    @auth
                        <x-products.show.cart-buttons :$sku />
                    @endauth

                    <hr>

                    <x-gifting />

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

                    @auth
                        <x-products.show.favorite-button :$sku />
                    @endauth

                    <hr>

                    <div class="flex items-center gap-2">
                        <div class="w-1/3 flex flex-col py-2 px-2 items-center bg-white border border-black rounded-xl">
                            <img src="/images/delivery/shipping.png" class="w-10 h-10">
                            <span class="text-[12px]">Shipping</span>
                            <span class="text-[10px]">Arrives in 3-7 days</span>
                        </div>

                        <div class="w-1/3 flex flex-col py-2 px-2 items-center bg-white border border-black rounded-xl">
                            <img src="/images/delivery/pickup.png" class="w-10 h-10">
                            <span class="text-[12px]">Pickup</span>
                            <span class="text-[10px]">Arrives in 2-3 days</span>
                        </div>

                        <div class="w-1/3 flex flex-col py-2 px-2 items-center bg-white border border-black rounded-xl">
                            <img src="/images/delivery/delivery.png" class="w-10 h-10">
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

    <x-products.show.reviews :$sku />
</div>

