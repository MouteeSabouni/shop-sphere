<div class="my-[10px] mx-16">
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    @if($skus->count() > 0)
        <div class="flex items-center gap-1 pb-4">
            <span class="text-xl font-bold">Favorite</span>
            @if($skus->count() === 1)
                <span class="text-lg">({{ $skus->count() }} item)</span>
            @else
                <span class="text-lg">({{ $skus->count() }} items)</span>
            @endif
        </div>
        <div class="flex gap-6 grid grid-cols-5">
            @foreach($skus as $sku)
                <x-user.favorite.card wire:key="{{$sku->id}}" :product="$sku->product" :$sku />
            @endforeach
        </div>
    @else
        <div class="flex flex-col items-center gap-3 mt-10">
            <span class="font-bold text-lg">
                You have not added anything to your favorite.
            </span>
            <a href="/products">
                <span class="border-b-2 border-gray-300">
                    Browse products.
                </span>
            </a>
        </div>
    @endif
</div>
