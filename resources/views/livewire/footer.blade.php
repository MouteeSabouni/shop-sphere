<footer class="px-28 py-12 bg-zinc-100">
    <div class="flex justify-between">
        <div class="flex items-center pb-12">
            <span class="font-bold text-[40px]">Trust is our top priority</span>
            <img class="h-16 w-16 ml-3" src="/images/logo.png">
        </div>
        <a href="#top">
            <img src="/images/arrow-circle-up.svg" class="w-16 h-16 animate-bounce">
        </a>
    </div>
    <div class="flex justify-between">
        <div class="grid grid-cols-2 w-1/5">
            <img src="/images/brands/apple.png" class="object-contain w-16 h-16">
            <img src="/images/brands/nike.png" class="object-contain w-16 h-16">
            <img src="/images/brands/samsung.png" class="object-contain w-16 h-16">
            <img src="/images/brands/dell.png" class="object-contain w-16 h-16">
            <img src="/images/brands/adidas.png" class="object-contain w-16 h-16">
            <img src="/images/brands/puma.svg" class="object-contain w-16 h-16">
        </div>
        <div class="flex flex-col w-[180px]">
            <p class="font-bold mb-8">POPULAR CATEGORIES</p>
            <div class="flex flex-col space-y-3">
                @foreach($categories as $category)
                    <a href="/categories/{{ $category->slug }}" class="text-sm hover:bg-white hover:rounded-full hover:px-2 font-medium hover:text-blue-600 transition-all duration-300">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="flex flex-col w-[150px]">
            <p class="font-bold mb-8">TOP BRANDS</p>
            <div class="flex flex-col space-y-3">
                @foreach($brands as $brand)
                <a href="/brands/{{ $brand->slug }}" class="text-sm hover:bg-white hover:rounded-full hover:px-2 font-medium hover:text-blue-600 transition-all duration-300">
                    {{ $brand->name }}
                </a>
                @endforeach
            </div>
        </div>
        <div class="w-96">
            <p class="font-bold mb-8">IN OUR STORE</p>

            @foreach($skus as $sku)
            <div class="hover:text-blue-600 hover:scale-110 transition-all" >
                <a href="/products/{{ $sku->product->slug }}/{{ $sku->code }}">
                    {{ $sku->product->name }}
                </a>
            </div>
            <div class="py-2">
                <hr>
            </div>
            @endforeach
        </div>
    </div>
</footer>
