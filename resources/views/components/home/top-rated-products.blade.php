<div class="py-10 px-20 bg-gray-100">
    <p class="text-3xl font-bold mb-6">
        Top-Rated Products
    </p>

    <div class="flex items-center rounded-2xl space-x-4 px-4 py-4 bg-white">
        @foreach($topRatedSkus as $sku)
            <a href="/products/{{$sku->product->slug}}/{{$sku->code}}">
                <div class="relative py-2 rounded-xl px-4 border flex flex-col hover:scale-[1.05] hover:opacity-60 transition-all">
                    <img src="{{$sku->images->first()->url}}" class="object-contain w-[275px] h-[275px]">
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold">${{ $sku->price }}</span>
                        <div class="flex items-center gap-1 text-sm">
                            <div class="flex items-center">
                                <img src="/star-solid.svg" class="w-4 h-4 opacity-70">
                                <span>{{ number_format($sku->reviews_sum_rating/$sku->reviews_count, 1) }}</span>
                            </div>
                            <span>({{$sku->reviews->count() }})</span>
                        </div>
                    </div>
                    <div>
                        {{ str($sku->product->name)->limit(30) }}
                    </div>
                </div>
            </a>
            @if($loop->iteration === 4) @break @endif
        @endforeach
    </div>
</div>
