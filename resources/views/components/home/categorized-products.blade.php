<div class="flex flex-col px-20 py-10">
    <p style="font-size: 30px; font-weight: bold; letter-spacing: -0.05rem">
        Shop by category
    </p>

    <div class="flex items-center justify-between mt-6 mb-2">
        <span class="font-medium text-xl">Electroncis</span>
        <a href="/categories/electronics">
            <span class="text-blue-600 hover:underline">See more</span>
        </a>
    </div>

    <div class="flex items-center rounded-2xl space-x-4">
        @foreach($electronicsProducts as $product)
            <a href="/products/{{$product->slug}}/{{$product->skus()->first()->code}}">
                <div class="relative border py-2 rounded-xl px-4 flex flex-col hover:scale-[1.05] hover:opacity-60 transition-all">
                    <img src="{{$product->skus()->first()->images()->first()->url}}" class="object-contain w-[275px] h-[275px]">
                    <div class="text-xl font-bold">
                        ${{ $product->skus()->first()->price }}
                    </div>
                    <div>
                        {{ str($product->name)->limit(30) }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="flex items-center justify-between mt-6 mb-2">
        <span class="font-medium text-xl">Wearing</span>
        <a href="/categories/wearing">
            <span class="text-blue-600 hover:underline">See more</span>
        </a>
    </div>

    <div class="flex items-center space-x-4 mb-8">
        @foreach($wearingProducts as $product)
            <a href="/products/{{$product->slug}}/{{$product->skus()->first()->code}}">
                <div class="relative border py-2 rounded-xl px-4 flex flex-col hover:scale-[1.05] hover:opacity-60 transition-all">
                    <img src="{{$product->skus()->first()->images()->first()->url}}" class="object-contain w-[275px] h-[275px]">
                    <div class="text-xl font-bold">
                        ${{ $product->skus()->first()->price }}
                    </div>
                    <div>
                        {{ str($product->name)->limit(30) }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
