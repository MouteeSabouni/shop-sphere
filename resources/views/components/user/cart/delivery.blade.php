<div x-data="{showOptions: true}">
    <button class="pb-4" x-on:click="showOptions = !showOptions">
        <div class="flex items-center">
            <img src="/images/phone.svg" alt="">
            <span class="font-bold text-xl pl-2 pr-1">
                Pickup and delivery options
            </span>
            <svg x-show="!showOptions" x-transition:enter.duration.1000ms x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
            <svg x-show="showOptions" x-transition:enter.duration.1000ms xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
            </svg>
        </div>
    </button>
    <div class="flex items-center gap-2 pb-6" x-show="showOptions" x-transition.duration.750ms>
        <button class="w-1/3">
            <div class="flex flex-col py-4 items-center bg-white border border-2 rounded-xl">
                <img src="/images/shipping.png" class="w-12 h-12">
                <span class="text-[14px]">Shipping</span>
                <span class="text-[12px]">Arrives in 3-7 days</span>
            </div>
        </button>

        <button class="w-1/3">
            <div class="flex flex-col py-4 items-center bg-white border border-2 border-blue-600 rounded-xl">
                <img src="/images/pickup.png" class="w-12 h-12">
                <span class="text-[14px]">Pickup</span>
                <span class="text-[12px]">Arrives in 2-3 days</span>
            </div>
        </button>

        <button class="w-1/3">
            <div class="flex flex-col py-4 items-center bg-white border border-2 rounded-xl">
                <img src="/images/delivery.png" class="w-12 h-12">
                <span class="text-[14px]">Home Delivery</span>
                <span class="text-[12px]">Arrives tomorrow</span>
            </div>
        </button>
    </div>
</div>
