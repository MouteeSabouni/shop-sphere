<nav>
    <div class="flex items-center justify-between">
        <div>
            <a wire:navigate.hover href="/">
                <img src="/images/logo.png" class="w-10 h-10">
            </a>
        </div>
        <div class="flex items-center space-x-4">
            @if(!auth()->user() || !auth()->user()->is_seller)
                <x-nav-link wire:navigate.hover href="/become-a-seller" :active="request()->is('become-a-seller')">Become a seller</x-nav-link>
            @endif
            <x-products.search />
            <x-nav-link wire:navigate.hover href="/products" :active="request()->is('products')">All Products</x-nav-link>
            <x-nav-link wire:navigate.hover href="/new-arrivals" :active="request()->is('new-arrivals')">New Arrivals</x-nav-link>
            <x-nav-link wire:navigate.hover href="/categories" :active="request()->is('categories')">Categories</x-nav-link>
        </div>

        @auth
            @if(auth()->user()->is_seller)
                <div class="flex items-center gap-1">
                    <x-nav-link wire:navigate.hover href="/products/create" :active="request()->is('products/create')">
                        <div class="flex items-center gap-1">
                            <img src="/images/outline-plus-circle.svg" class="w-5 h-5" />
                            Publish new product
                        </div>
                    </x-nav-link>
                </div>
            @endif
        @endauth

        <div class="flex items-center space-x-3">
            @guest
                <x-nav-link wire:navigate.hover href="/register" :active="request()->is('register')">Register</x-nav-link>
                <x-nav-link wire:navigate.hover href="/login" :active="request()->is('login')">Log In</x-nav-link>
            @endguest

            @auth
                <div class="flex items-center gap-3">
                    <x-user-options />
                    <a href="/cart">
                        <div class="flex flex-col items-center w-[60px]">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[26px] w-[26px]" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                </svg>
                                <div class="right-11 top-5 absolute flex flex-col items-center text-center text-[10px] font-bold text-white bg-blue-600 rounded-full h-4 w-4">
                                    {{ auth()->user()->itemsInCart() }}
                                </div>
                            </div>
                            <div class="text-xs">
                                ${{ auth()->user()->totalInCart() }}
                            </div>
                        </div>
                    </a>
                </div>
            @endauth
        </div>

    </div>
</nav>
