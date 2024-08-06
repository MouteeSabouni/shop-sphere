@if($sku->isRated())
    <div class="flex items-center text-sm">
        <span class="text-sm">
            {{ $sku->rating()}}
        </span>
        <img class="w-[18px] h-[18px]" src="/star-solid.svg" />
        <a class="underline" href="/products/{{ $sku->product->slug }}/{{ $sku->code }}/#reviews">
            ({{$sku->reviews->count()}} reviews)
        </a>
    </div>
@else
    <span class="text-sm">No ratings yet</span>
@endif
