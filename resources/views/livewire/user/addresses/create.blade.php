<div class="rounded-xl my-10 mx-20 flex flex-col w-1/2">
    @if(auth()->user()->addresses()->count() > 0)
        <p class="text-3xl font-bold">Manage your addresses!</p>
        <p class="text-xl my-4">Click an address to edit it.</p>

        <div class="flex-none items-center">
            @foreach(auth()->user()->addresses()->latest()->get() as $address)
                <button class="my-1.5 bg-blue-200 hover:opacity-60 rounded-xl py-1 font-medium transition-all duration-300 text-sm">
                    <a href="/user/addresses/{{ $address->id }}" class="px-2">
                        {{ $address->name }}
                    </a>
                </button>
            @endforeach
        </div>

        <hr class="my-4">
    @endif

    <div class="flex items-center">
        <h2 class="text-3xl font-bold pr-2">Add a new address!</h2>

        <div x-cloak>
            <div x-show = "$wire.showCreated"
                x-transition.out.opacity.duration.2000ms
                x-effect="if($wire.showCreated) setTimeout(() => $wire.showCreated = false, 5000)"
                class="flex gap-2 items-center bg-green-500 text-white rounded-full px-3 py-1 text-sm font-medium">
                <span>Address added successfully!</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

    <form wire:submit="create">
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

        <div class="flex items-center justify-between pt-4">
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

            <div>
                <a href="javascript:history.back()" class="w-fit text-[15px] text-center font-medium px-3">Go back</a>
                <button type="submit" class="w-fit text-[15px] text-center rounded-xl bg-blue-500 text-white px-4 py-1.5 font-medium disabled:cursor-not-allowed disabled:opacity-70">
                    Add
                </button>
            </div>
        </div>
    </form>
</div>
</div>
