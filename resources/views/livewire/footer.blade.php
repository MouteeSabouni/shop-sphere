<footer class="px-20 py-12 bg-zinc-100">
    <div class="flex justify-between">
        <div class="flex items-center pb-12">
            <span class="font-bold text-[40px]">Trust is our top priority</span>
        </div>
        <a href="#top">
            <img src="/images/arrow-circle-up.svg" class="w-16 h-16 animate-bounce">
        </a>
    </div>
    <div class="flex justify-between">
        <div class="grid grid-cols-2 w-1/5 gap-y-3">
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
                    <a href="/categories/{{ $category->slug }}" class="text-sm hover:scale-110 hover:text-blue-600 font-medium hover:text-blue-600 transition-all">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="flex flex-col w-[150px]">
            <p class="font-bold mb-8">TOP BRANDS</p>
            <div class="flex flex-col space-y-3">
                @foreach($brands as $brand)
                <a href="/brands/{{ $brand->slug }}" class="text-sm hover:scale-110 hover:text-blue-600 font-medium hover:text-blue-600 transition-all">
                    {{ $brand->name }}
                </a>
                @endforeach
            </div>
        </div>
        <div class="w-96">
            <p class="font-bold mb-8">IN OUR STORE</p>

            @foreach($skus as $sku)
            <div class="hover:text-blue-600 hover:scale-110 transition-all text-sm font-medium" >
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
    <div class="mt-10 text-sm flex flex-col items-center text-gray-500">
        <span>
            © 2021-2024 ShopSphere™. All Rights Reserved.
        </span>
        <div class="flex items-center opacity-50 mt-4 gap-x-3">
            <a href="https://www.facebook.com/moutee.alsabouni/">
                <img src="/images/footer/facebook.svg" class="w-6 h-6">
            </a>
            <a href="https://github.com/MouteeSabouni/">
                <img src="/images/footer/github.svg" class="w-6 h-6">
            </a>
            <a href="https://www.linkedin.com/in/moutee-alsabouni/">
                <img src="/images/footer/linkedin.png" class="w-6 h-6">
            </a>
            <a href="https://wa.me/+963938560806">
                <img src="/images/footer/whatsapp.svg" class="w-6 h-6">
            </a>
        </div>
    </div>
</footer>
