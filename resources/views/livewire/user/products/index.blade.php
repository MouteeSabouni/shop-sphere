<div class="py-10 mx-20">
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    @if($products->count() > 0)
        <div class="flex gap-x-4">
            <div class="w-full">
                <div class="grid grid-cols-2 gap-4">
                    @foreach($products as $product)
                        <div class="flex flex-col gap-1.5 border border-gray-300 py-3 rounded-lg px-3">
                            <span class="font-medium">{{ $product->name }}</span>
                            <div class="flex flex-col gap-0.5">
                                <span class="text-sm">Published {{ $product->created_at->diffForHumans() }}</span>
                                <span class="text-sm">Number of sub products: {{ $product->skus->count() }}</span>
                            </div>
                            <div class="flex items-end justify-between text-sm">
                                <a href="/user/products/{{$product->slug}}" class="underline">View product</a>
                                <a href="/user/products/add-sub-products/{{ $product->slug }}" class="px-3 py-1 bg-blue-600 text-white font-medium rounded-lg">Add sub products</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="flex flex-col items-center gap-3">
            <span class="font-bold text-lg">
                You don't have any products on our website.
            </span>
            <a href="/products/create">
                <span class="border-b-2 border-black hover:text-blue-600 hover:border-blue-600">
                    Start selling.
                </span>
            </a>
        </div>
    @endif
</div>
