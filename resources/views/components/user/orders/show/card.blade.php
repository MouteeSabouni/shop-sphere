@props(['product', 'sku', 'item'])
<div @class([
    'flex items-center border border-2 rounded-3xl',
    'opacity-50' => $sku->status === 0
    ])
>
    <a wire:navigate.hover href="/products/{{ $item->sku->product->slug }}/{{ $item->sku->code }}">
        <img src="{{ $item->sku->images->first()->url }}" class="object-contain px-2 w-[100px] h-[100px] rounded-xl hover:animate-pulse">
    </a>

    <div class="flex flex-col justify-between gap-y-1 p-3 rounded-xl w-full">
        @if($sku->status === 0)
            <div class="text-sm font-medium bg-gray-200 px-3 py-0.5 mt-2 w-fit rounded-full">
                OUT OF STOCK
            </div>
        @endif

        <div class="space-y-1">
            <div class="flex justify-between gap-20">
                <h3 class="text-lg font-bold transition-colors duration-300 pr-1">
                    {{ $product->name }}
                </h3>
                <p class="tracking-tight text-green-600 font-bold text-xl">${{ $sku->price }}</p>
            </div>

            <div class="flex justify-between">
                <div class="flex items-center gap-1">
                    <span class="text-sm font-medium">Brand:</span>
                    <a href="/brands/{{ $product->brand->slug }}" class="text-sm underline">
                        {{ $product->brand->name }}
                    </a>
                    <span class="text-sm font-medium">— Seller:</span>
                    <a href="/brands/{{ $product->seller->id }}" class="text-sm underline">
                        {{ $product->seller->first_name }}
                    </a>
                </div>

                <div class="flex items-center gap-1">
                    <span class="text-sm font-medium">Quantity:</span>
                    <span class="text-[15px]">{{$item->quantity}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
