<x-dialog wire:model="showModal">
    <x-dialog.open>
        <button class="text-sm bg-blue-600 gap-[1px] px-4 py-1 rounded-full text-white font-medium flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white" class="size-[18px]">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>

            <span>Rate this product</span>
        </button>
    </x-dialog.open>

    <x-dialog.panel>
        <h2 class="text-xl font-bold">Rate this product</h2>

        <div class="flex mt-6 justify-center">
            @for ($i = 1; $i < $rating+1; $i++)
                <button wire:click="rateProduct({{$i}})">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-7 h-7" fill="black">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </button>
            @endfor

            @for ($i = $rating+1; $i < 6; $i++)
                <button wire:click="rateProduct({{$i}})">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" stroke="black" class="w-7 h-7" fill="white">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </button>
            @endfor
        </div>

        @error('rating')
            <div class="text-red-600 text-sm font-semibold flex flex-col items-center">{{ $message }}</div>
        @enderror

        <form wire:submit="addProductReview">
            @csrf

            <div class="mt-4 text-gray-600">
                <textarea rows="6" type="text" wire:model="comment" class="mb-1 w-full block border-gray-300 resize-none overflow-auto bg-input-bg py-3 px-3 placeholder:text-[15px] placeholder:text-gray-400/80 rounded-xl h-full" type="text" placeholder="Product was exactly as it is in description." required></textarea>
                <div class="absolute right-8 flex justify-end mt-0.5">
                    <span class="relative text-sm text-gray-400" x-text="$wire.comment.length"></span>
                    <span class="text-sm text-gray-400">/500</span>
                </div>

                @error('comment')
                    <div class="absolute left-8 text-red-600 text-sm font-semibold">{{ $message }}</div>
                @enderror

                <button type="submit" class="w-full mt-12 bg-blue-600 text-white font-bold text-lg rounded-full px-6 py-1">
                    Submit review
                </button>
            </div>
        </form>
    </x-dialog.panel>
</x-dialog>
