<div class="flex items-center mb-6 gap-4">
    <div class="flex items-center font-bold text-2xl gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mt-0.5 size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
        </svg>
        <span>Filter</span>
    </div>

    <div x-data="{showPrice: false}">
        <button x-on:click="showPrice = !showPrice" x-ref="button" id="alpine-menu-button">Price</button>

        <div x-show="!showPrice" class="border border-gray-300 rounded py-2 px-2 z-20"
        x-transition:enter.origin.top.right
        x-anchor.bottom-start="$refs.button"
        >
            <input type="checkbox" class="rounded-full"/>0-100
            <input type="checkbox"/>0-200
        </div>
    </div>
</div>
