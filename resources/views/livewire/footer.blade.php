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
                <svg xmlns="http://www.w3.org/2000/svg" class="mb-0.5 h-6 w-6" viewBox="0 0 20 20" fill="black">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                </svg>
            </a>
            <a href="https://github.com/MouteeSabouni/">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000">
                    <path d="M1000 508c0 232-160 429-375 485V862c0-41-10-98-52-131 134-20 239-99 239-223 0-51-21-102-58-144 11-47 17-105-4-148-53 5-106 32-145 56-33-8-67-14-105-14s-73 6-106 14c-39-24-91-51-144-56-21 43-16 101-5 148-37 42-57 93-57 144 0 124 105 203 239 223-20 15-32 36-40 57-105 2-189-81-190-81-5-4-12-5-16-2-6 3-9 10-7 16 2 5 44 124 201 172v100C160 937 0 740 0 508 0 233 223 8 500 8c275 0 500 225 500 500z"></path>
                </svg>
            </a>
            <a href="https://www.linkedin.com/in/moutee-alsabouni/">
                <img src="/images/linkedin.png" class="w-6 h-6">
            </a>
            <a href="https://wa.me/+963938560806">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000">
                    <path d="M1000 500c0 277-223 500-500 500S0 777 0 500 223 0 500 0s500 223 500 500zM365.5 744c43 23.4 91.4 35.8 140.6 35.8h.1c162.2 0 294.2-132 294.3-294.3 0-78.6-30.6-152.6-86.1-208.2-55.6-55.6-129.5-86.3-208.2-86.3C344 191 212 323.1 211.9 485.3c0 51.9 13.5 102.5 39.3 147.1L209.5 785l156-41zm-85.4-29l24.7-90.3-5.8-9.3c-24.5-38.9-37.4-84-37.4-130.2.1-134.9 109.8-244.6 244.7-244.6 65.3 0 126.7 25.5 172.9 71.7s71.6 107.7 71.6 173c0 135.1-109.8 244.8-244.6 244.8h-.1c-43.9 0-86.9-11.8-124.5-34.1l-8.9-5.3-92.6 24.3zm374.4-159.5c-1.8-3.1-6.7-4.9-14.1-8.6-7.4-3.7-43.5-21.5-50.2-23.9-6.7-2.5-11.6-3.7-16.5 3.7s-19 23.9-23.3 28.8c-4.3 4.9-8.6 5.5-15.9 1.8-7.4-3.7-31-11.4-59.1-36.5-21.9-19.5-36.6-43.6-40.9-50.9-4.3-7.4-.5-11.3 3.2-15 3.3-3.3 7.4-8.6 11-12.9 3.7-4.3 4.9-7.4 7.4-12.3s1.2-9.2-.6-12.9c-1.8-3.7-16.5-39.9-22.7-54.6-6-14.3-12-12.4-16.5-12.6-4.3-.2-9.2-.3-14.1-.3s-12.9 1.8-19.6 9.2c-6.7 7.4-25.7 25.2-25.7 61.3 0 36.2 26.3 71.2 30 76.1 3.7 4.9 51.9 79.2 125.6 111 17.5 7.6 31.2 12.1 41.9 15.5 17.6 5.6 33.6 4.8 46.3 2.9 14.1-2.1 43.5-17.8 49.6-35 6-17 6-31.7 4.2-34.8z"></path>
                </svg>
            </a>
        </div>
    </div>
</footer>
