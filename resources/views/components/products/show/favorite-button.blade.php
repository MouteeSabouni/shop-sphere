@if($sku->favoritedBy->pluck('id')->contains(auth()->id()))
    <button type="button" wire:click="unfavorite({{$sku->id}})">
        <div class="flex flex-col items-center py-2 bg-blue-600 rounded-full text-white font-bold text-sm">
            <div class="flex gap-1 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[17px] w-[17px]" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                </svg>
                <span>Remove from favorite</span>
            </div>
        </div>
    </button>
@else
<button type="button" wire:click="favorite({{$sku->id}})">
    <div class="flex flex-col items-center py-2 bg-blue-600 rounded-full text-white font-bold text-sm">
        <div class="flex gap-1 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-[17px] w-[17px]" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
            </svg>
            <span>Add to favorite</span>
        </div>
        </div>
    </button>
@endif
