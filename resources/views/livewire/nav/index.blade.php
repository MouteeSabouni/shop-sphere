<div class="px-8 py-1.5 border-b bg-zinc-100 fixed top-0 w-full z-10">
    <nav>
        <div class="flex items-center justify-between">
            <div>
                <a wire:navigate.hover href="/">
                    <img src="/images/logo.png" class="w-10 h-10">
                </a>
            </div>

            <div class="flex items-center space-x-4">
                <x-nav.link wire:navigate.hover href="/products" :active="request()->is('products')">All Products</x-nav.link>
                <x-nav.link wire:navigate.hover href="/products/newest" :active="request()->is('products/newest')">New Arrivals</x-nav.link>
                <livewire:nav.categories />
            </div>

            <x-nav.search />

            @auth
                @if(auth()->user()->is_seller)
                    <div class="flex items-center gap-1">
                        <x-nav.link wire:navigate.hover href="/products/create" :active="request()->is('products/create')">
                            <div class="flex items-center gap-1">
                                <img src="/images/outline-plus-circle.svg" class="w-5 h-5" />
                                Publish new product
                            </div>
                        </x-nav.link>
                    </div>
                @else
                    <x-nav.link wire:navigate.hover href="/become-seller" :active="request()->is('become-seller')">Become a seller</x-nav.link>
                @endif
            @endauth

            <div class="flex items-center space-x-3">
                @guest
                    <x-nav.link wire:navigate.hover href="/register" :active="request()->is('register')">Register</x-nav.link>
                    <x-nav.link wire:navigate.hover href="/login" :active="request()->is('login')">Log In</x-nav.link>
                @endguest

                @auth
                    <div class="flex items-center gap-3">
                        <x-nav.user-options />

                        <livewire:nav.cart />
                    </div>
                @endauth
            </div>

        </div>
    </nav>
</div>
