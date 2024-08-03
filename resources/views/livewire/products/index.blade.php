<div class="mt-6">
    <div class="flex gap-6 grid grid-cols-4">
        @foreach($products as $product)
            <div class="flex flex-col">
                <a wire:navigate.hover href="/products/{{ $product->slug }}/{{ $product->skus->first()->code }}">
                    <img src="{{ $product->skus->first()->images->first()->url }}" class="object-contain w-[325px] h-[325px] rounded-xl hover:animate-pulse">
                </a>
                <x-products.card wire:key="{{$product->skus->first()->id}}" :$product :sku="$product->skus->first()" />
            </div>
        @endforeach
    </div>
</div>
