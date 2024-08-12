<div class="my-10 mx-12">
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    @if($products->count() === 0)
        <div class="flex flex-col items-center mx-auto font-medium text-lg">
            <div class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                </svg>
                <span>
                    No results found. Try another search.
                </span>
            </div>
        </div>
    @else
        <div class="flex gap-6 grid grid-cols-4">
            @foreach($products as $product)
                <x-products.index.card wire:key="{{$product->skus->first()->id}}" :$product :sku="$product->skus->first()" />
            @endforeach
        </div>

        <div>
            {{ $products->links() }}
        </div>
    @endif
</div>
