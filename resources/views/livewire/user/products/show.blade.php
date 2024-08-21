<div class="py-10 mx-20">
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="flex gap-x-4">
        <div class="w-full">
            <div class="flex flex-col gap-1 w-1/2">
                <span class="font-bold text-xl">{{ $product->name }}</span>
                <span>Number of sub products: {{ $product->skus->count() }}</span>
                <a href="/user/products/add-sub-products/{{ $product->slug }}" class="px-3 w-fit py-1 bg-blue-600 text-white font-medium rounded-lg">Add sub products</a>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-4">
                @foreach($product->skus as $sku)
                    <div class="flex items-center border border-gray-300 py-3 rounded-lg px-3">
                        <img src="{{$sku->images->first()->url}}" class="object-contain w-24 h-24 mr-2">
                        <div class="flex flex-col gap-1">
                            <span class="font-medium">${{ $sku->price }}</span>
                            <span class="text-sm">Added {{ $sku->created_at->diffForHumans() }}</span>
                            <a href="/products/{{$product->slug}}/{{$sku->code}}" class="text-sm underline">View</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
