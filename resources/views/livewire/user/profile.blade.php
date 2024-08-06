<div class="rounded-xl p-8 flex flex-col w-2/3">
    <h2 class="text-3xl font-bold mb-6">Update your profile!</h2>

    <hr class="w-[75%]">

    <form wire:submit="save">
        <div class="flex gap-3 mt-6">
            <label class="flex flex-col gap-2 w-1/2">
                <span>First name</span>
                <input type="text" wire:model="form.first_name"
                @class([
                    'px-3 py-2 text-sm rounded-lg' => true,
                    'border border-slate-300' => $errors->missing('form.first_name'),
                    'border-2 border-red-500' => $errors->has('form.first_name')
                ])>
                @error('form.first_name')
                    <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
                @enderror
            </label>

            <label class="flex flex-col gap-2 w-1/2">
                <span>Last name</span>
                <input type="text" wire:model="form.last_name" @class([
                    'px-3 py-2 text-sm border border-slate-300 rounded-lg',
                    'border border-slate-300' => $errors->missing('form.last_name'),
                    'border-2 border-red-500' => $errors->has('form.last_name')
                ])>
                @error('form.last_name')
                    <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
                @enderror
            </label>
        </div>

        <div class="flex gap-3 mt-2">

            <label class="flex flex-col gap-2 w-1/2">
                <span>Email</span>
                <input type="email" wire:model.blur="form.email" @class([
                    'px-3 py-2 text-sm border border-slate-300 rounded-lg',
                    'border border-slate-300' => $errors->missing('form.email'),
                    'border-2 border-red-500' => $errors->has('form.email')
                ])>
                @error('form.email')
                    <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
                @enderror
            </label>

            <label class="flex flex-col gap-2 w-1/2">
                <span>Username</span>
                <input type="text" wire:model.blur="form.username" @class([
                    'px-3 py-2 text-sm border border-slate-300 rounded-lg',
                    'border border-slate-300' => $errors->missing('form.username'),
                    'border-2 border-red-500' => $errors->has('form.username')
                ])>
                @error('form.username')
                    <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
                @enderror
            </label>
        </div>

        {{-- <div class="flex gap-3 mt-2">
            <label class="flex flex-col gap-2 w-1/2">
                <span>Password</span>
                <input type="password" wire:model.blur="form.password" class="px-3 py-2 border border-slate-300 rounded-lg">
                @error('form.password')
                    <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
                @enderror
            </label>

            <label class="flex flex-col gap-2 w-1/2">
                <span>Confirm password</span>
                <input type="password" wire:model="form.password_confirmation" class="px-3 py-2 border border-slate-300 rounded-lg">
                @error('form.password_confirmation')
                    <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
                @enderror
            </label>
        </div> --}}


        <div class="flex items-center justify-end pt-4">
            <a href="javascript:history.back()" class="w-fit text-center font-medium px-3">Cancel</a>
            <button type="submit" class="w-fit text-center rounded-xl bg-blue-500 text-white px-6 py-2 font-medium disabled:cursor-not-allowed disabled:opacity-70">Save</button>
        </div>
    </form>

    <div class="flex justify-end" x-cloak>
        <div x-show = "$wire.showUpdated"
            x-transition.out.opacity.duration.2000ms
            x-effect="if($wire.showUpdated) setTimeout(() => $wire.showUpdated = false, 3000)"
            class="flex gap-2 mt-4 items-center text-green-500 text-sm font-medium">
            <span>Profile updated successfully!</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>
</div>
</div>
