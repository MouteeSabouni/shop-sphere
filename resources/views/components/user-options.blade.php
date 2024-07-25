{{-- <div class="relative inline-block text-left">
    <div>
        <button type="button" id="menu-button" class="inline-flex w-full justify-center py-2 text-sm font-semibold">
        </button>
    </div>

    <div id="dropdown-menu" class="absolute w-44 right-0 z-10 mt-2 origin-top-right rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical">
        <a href="/users/{{ auth()->user()->username }}" class="block hover:bg-zinc-200 hover:rounded px-4 py-2 text-sm">My profile</a>
        <a href="{{ auth()->user()->username }}/orders" class="block hover:bg-zinc-200 hover:rounded px-4 py-2 text-sm">My orders</a>

        <form method="POST" action="/logout">
            @csrf
            <button class="w-full text-left px-4 py-2 text-sm hover:bg-zinc-200 hover:rounded" type='submit'>Log out</button>
        </form>
    </div>
</div> --}}

<div>
    <x-menu>
        <x-menu.button>
        <div class="flex items-center text-sm font-medium">
            <span>
                {{ auth()->user()->first_name }}
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" class="size-6 pl-1">
                <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
            </svg>
        </div>
        </x-menu.button>

        <x-menu.items>
            <x-menu.item>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

                <a href="/users/{{ auth()->user()->id }}" class="text-sm w-full">My profile</a>
            </x-menu.item>

            <x-menu.item>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>

                <a href="/myorders/{{ auth()->user()->id }}" class="text-sm w-full">My orders</a>
            </x-menu.item>

            <x-menu.item wire:click="logout">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                </svg>
                    Log out
            </x-menu.item>
        </x-menu.items>
    </x-menu>
</div>
