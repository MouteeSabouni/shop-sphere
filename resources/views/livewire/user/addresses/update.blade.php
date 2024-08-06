<div class="rounded-xl p-8 flex flex-col w-2/3">
    <div class="flex items-center mb-6">
        <h2 class="text-3xl font-bold pr-2">Update your address!</h2>

        <div x-cloak>
            <div x-show = "$wire.showUpdated"
                x-transition.out.opacity.duration.2000ms
                x-effect="if($wire.showUpdated) setTimeout(() => $wire.showUpdated = false, 5000)"
                class="flex gap-2 items-center bg-green-500 text-white rounded-full px-3 py-1 text-sm font-medium">
                <span>Address updated successfully!</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

    <form wire:submit="update">
        <label class="flex flex-col gap-2 mt-6 pb-4">
            <input placeholder="Address line" type="text" wire:model="address_line" @class([
                'px-3 py-2 text-sm border rounded-lg placeholder-gray-400 w-full',
                'border border-slate-300' => $errors->missing('address_line'),
                'border-2 border-red-500' => $errors->has('address_line')
            ])>

            @error('address_line')
                <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
            @enderror
        </label>

        <div class="flex gap-3">
            <label class="flex flex-col items-center w-1/2">
                <input placeholder="District (optional)" wire:model="district" @class([
                    'px-3 py-2 text-sm border rounded-lg placeholder-gray-400 w-full',
                    'border border-slate-300' => $errors->missing('district'),
                    'border-2 border-red-500' => $errors->has('district')
                ])>
                @error('district')
                    <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
                @enderror
            </label>

            <label class="flex flex-col gap-2 w-1/2">
                <input placeholder="City" type="text" wire:model="city"
                @class([
                    'px-3 py-2 text-sm rounded-lg placeholder-gray-400 w-full' => true,
                    'border border-slate-300' => $errors->missing('city'),
                    'border-2 border-red-500' => $errors->has('city')
                ])>
                @error('city')
                    <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
                @enderror
            </label>
        </div>

        <div class="flex items-end justify-between pt-4">
            <label class="flex flex-col gap-2">
                <div>
                    <span class="text-[15px]">Want to give this address a name?</span>
                    <span class="text-xs text-gray-500">(optional)</span>
                </div>
                <input placeholder="Address name" type="text" wire:model="name"
                @class([
                    'px-3 py-2 text-sm rounded-lg placeholder-gray-400 w-full' => true,
                    'border border-slate-300' => $errors->missing('name'),
                    'border-2 border-red-500' => $errors->has('name')
                ])>
                @error('name')
                    <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
                @enderror
            </label>

            <button type="button"  wire:confirm="Are you sure you want to delete this address entirely?" class="flex items-center gap-0.5 hover:scale-110" wire:click="delete">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>

                <span class="text-sm underline">
                    Remove this address
                </span>
            </button>

            <div>
                <a href="javascript:history.back()" class="w-fit text-[15px] text-center font-medium px-3">Go back</a>
                <button type="submit" class="w-fit text-[15px] text-center rounded-xl bg-blue-500 text-white px-4 py-1.5 font-medium disabled:cursor-not-allowed disabled:opacity-70">
                    Update
                </button>
            </div>
        </div>
    </form>
</div>
</div>
