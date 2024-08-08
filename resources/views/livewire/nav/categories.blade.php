<div x-data="{ menuOpen: false }">
    <div x-menu x-model="menuOpen" class="relative flex items-center">
        <button x-menu:button x-ref="button" type="button" class="hover:scale-110 flex items-center gap-0.5 text-sm font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
            </svg>
            <span>
                Categories
            </span>
            <svg x-show="!menuOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
            <svg x-show="menuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
            </svg>
        </button>
        <div x-menu:items x-transition:enter.origin.top.right x-anchor.bottom-start="$refs.button" x-cloak x-collapse.duration.750ms
            class="w-[552px] bg-white border border-gray-200 rounded-lg shadow-md outline-none mt-8 z-10"
        >
            <div class="grid grid-cols-3">
                @foreach(array_slice($categories->toArray(), $currentIndex, $visibleCount) as $category)
                    <a wire:navigate.hover href="/categories/{{ $category['slug'] }}" x-menu:item class="py-2 px-3 text-left text-sm hover:bg-slate-100 transition-all hover:font-bold">
                        {{ $category['name'] }}
                    </a>
                @endforeach
            </div>

            @if($visibleCount <= $categories->count())
            <div class="text-center mt-3 mb-5 space-x-4">
                <button wire:click="scrollLeft(24)"
                @class([
                    'bg-white border border-gray-300 rounded-full p-2 shadow',
                    'opacity-20 cursor-not-allowed' => $currentIndex === 0
                ])
                {{ $currentIndex === 0 ? 'disabled' : ''}}
                >
                    <img src="/images/chevron-left.svg" class="h-6 w-6" />
                </button>

                <button wire:click="scrollRight(24)"
                @class([
                    'bg-white border border-gray-300 rounded-full p-2 shadow',
                    'opacity-20 cursor-not-allowed' => $currentIndex+$visibleCount >= $categories->count()
                ])
                {{ $currentIndex+$visibleCount >= $categories->count() ? 'disabled' : ''}}
                >
                    <img src="/images/chevron-right.svg" class="h-6 w-6" />
                </button>
            </div>
        @endif
        </div>
    </div>
</div>
