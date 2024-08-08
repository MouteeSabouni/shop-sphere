<div class="my-6">
        <x-slot:title>
            {{ $title }}
        </x-slot:title>
    <div class="flex gap-6 grid grid-cols-4">
        @foreach($products as $product)
            <x-products.index.card wire:key="{{$product->skus->first()->id}}" :$product :sku="$product->skus->first()" />
        @endforeach
    </div>

    <div>
        {{ $products->links('vendor.pagination.simple-tailwind') }}
    </div>
</div>
