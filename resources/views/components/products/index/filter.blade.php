<div class="sticky top-[80px] self-end text-[15px] px-6 pb-1">
    <div class="flex items-center font-bold text-2xl gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mt-0.5 size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
        </svg>
        <span>Filter by</span>
    </div>
    <div class="flex flex-col" x-data="{show: true}">
        <button class="mt-4 flex justify-between" x-on:click="show = !show">
            <span class="font-medium">Price</span>
            <svg x-show="!show" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
            </svg>
        </button>

        <div class="flex flex-col mt-3 space-y-2 text-sm" x-show="show">
            <div class="relative flex items-center justify-between">
                <span>Min</span>
                <span class="absolute right-[85px] top-[5px] text-gray-500 border-r border-gray-400 px-2">$</span>
                <input type="text" wire:model.live.debounce.500ms="filter.min" class="border border-gray-300 rounded pl-7 pr-2 py-1 w-1/2 text-sm" placeholder="10.00" required>
            </div>

            <div class="relative flex items-center justify-between">
                <span>Max</span>
                <span class="absolute right-[85px] top-[5px] text-gray-500 border-r border-gray-400 px-2">$</span>
                <input type="text" wire:model.live.debounce.500ms="filter.max" class="border border-gray-300 rounded pl-7 pr-2 py-1 w-1/2 text-sm" placeholder="100.00" required>
            </div>
        </div>
    </div>

    <div class="flex flex-col" x-data="{show: true}">
        <button class="mt-3 flex justify-between" x-on:click="show = !show">
            <span class="font-medium">Rating</span>
            <svg x-show="!show" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
            </svg>
        </button>
        <div id="price-range" x-show="show" class="flex flex-col gap-1">
            @foreach (range(4, 1) as $i)
            <label class="flex items-center gap-1 mt-1">
                <input type="radio" name="rateFilter" value="{{$i}}" wire:model.live="filter.rating">
                <div class="flex">
                    @foreach (range(1, $i) as $j)
                        <img src="/star-solid.svg" class="w-5 h-5" />
                    @endforeach
                    @foreach (range(1, 5-$i) as $k)
                        <img src="/star-outline.svg" class="w-5 h-5" />
                    @endforeach
                    <span class="text-sm pl-1">& above</span>
                </div>
                    </label>
            @endforeach
        </div>
    </div>

    <div class="flex flex-col" x-data="{show: true}">
        <button class="mt-3 flex justify-between" x-on:click="show = !show">
            <span class="font-medium">Date</span>
            <svg x-show="!show" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
            </svg>
        </button>
        <div id="price-range" x-show="show" class="flex flex-col justify-between w-full gap-2">
            <input type="date" wire:model.live="filter.from" class="mt-2 rounded border border-gray-400 px-2 py-1 text-sm w-full" required>

            <input type="date" wire:model.live="filter.to" class="rounded border border-gray-400 px-2 py-1 text-sm w-full" required>
        </div>
    </div>

    <div class="flex items-center justify-center gap-2 text-sm font-semibold my-10">
        <button class="rounded-xl border border-gray-400 px-4 py-1.5" wire:click="clearFilter">Clear all</button>
    </div>
</div>
