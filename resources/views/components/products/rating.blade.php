@if($sku->reviews()->exists())
    <div class="flex items-center text-sm">
        <span class="text-sm">
            {{ number_format($sku->reviews_sum_rating/$sku->reviews_count, 1) }}
        </span>
        <img class="w-[18px] h-[18px]" src="/star-solid.svg" />
        <a class="text-gray-500 underline" href="/products/{{ $sku->product->slug }}/{{ $sku->code }}/#reviews">
            ({{ $sku->reviews_count }} reviews)
        </a>
    </div>
@else
    <span class="text-sm">No ratings yet</span>
@endif
