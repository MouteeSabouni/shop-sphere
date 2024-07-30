<nav>
    <div class="flex items-center justify-between">
        <div>
            <a wire:navigate.hover href="/">
                <img src="/images/logo.png" class="w-10 h-10">
            </a>
        </div>
        <div class="flex items-center space-x-3">
            <x-nav-link wire:navigate.hover href="/new-arrivals" :active="request()->is('new-arrivals')">New Arrivals</x-nav-link>
            <x-nav-link wire:navigate.hover href="/categories" :active="request()->is('categories')">Categories</x-nav-link>
        </div>

        <div class="flex items-center space-x-3">
            @guest
                <x-nav-link wire:navigate.hover href="/register" :active="request()->is('register')">Register</x-nav-link>
                <x-nav-link wire:navigate.hover href="/login" :active="request()->is('login')">Log In</x-nav-link>
            @endguest

            @auth
                <x-user-options />
            @endauth
        </div>

    </div>
</nav>
