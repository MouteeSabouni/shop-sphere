<x-dialog wire:model="showModal">
    <x-dialog.open>
        <div class="flex justify-center mt-12">
            <button class="border border-2 border-black hover:opacity-80 hover:scale-110 font-bold text-xl rounded-full px-8 py-2">Leave us a review</button>
        </div>
    </x-dialog.open>

    <x-dialog.panel>
        <h2 class="text-xl font-bold">Leave us a review</h2>

        <h3 class="font-bold text-slate-800 mt-8">Current job title and company</h3>
        <input type="text" wire:model.live.debounce.500ms="user_title" class="mb-0.5 w-full border-gray-300 px-3 py-3 rounded-xl mt-2 placeholder:text-[15px] placeholder:text-gray-400/80" placeholder="Web developer at twitter"/>

        @error('user_title')
            <span class="text-red-600 text-sm font-semibold">{{ $message }}</span>
        @enderror

        <h3 class="font-bold text-slate-800 mt-6">What do you think of ShopSphere?</h3>
        <form wire:submit="addTestimony">
            @csrf

            <div class="mt-2 text-gray-600">
                <textarea rows="6" type="text" wire:model.live.debounce.500ms="comment" class="mb-1 w-full block border-gray-300 resize-none overflow-auto bg-input-bg py-3 px-3 placeholder:text-[15px] placeholder:text-gray-400/80 rounded-xl h-full" type="text" placeholder="Best shopping experience ever! Definitely five stars!" required></textarea placeholder="Web developer @ twitter"a>
                <div class="absolute right-8 flex justify-end mt-0.5">
                    <span class="relative text-sm text-gray-400" x-text="$wire.comment.length"></span>
                    <span class="text-sm text-gray-400">/500</span>
                </div>

                @error('comment')
                    <div class="absolute left-8 text-red-600 text-sm font-semibold">{{ $message }}</div>
                @enderror

                <button class="w-full mt-12 bg-blue-600 text-white font-bold text-lg rounded-full px-6 py-1">
                    Submit review
                </button>
            </div>
        </form>

        <div x-cloak class="flex justify-end">
            <div x-show="$wire.reviewSubmitted"
                x-transition.out.opacity.duration.2000ms
                x-effect="if($wire.reviewSubmitted) setTimeout(() => $wire.reviewSubmitted = false, 3000)"
                class="flex gap-2 mt-3 items-center justify-end w-fit bg-green-500 text-white rounded-full px-3 py-1 text-sm font-medium">
                <span>Review added!</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </x-dialog.panel>
</x-dialog>
