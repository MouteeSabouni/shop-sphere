<div class="flex my-10 mx-20">
    <div id="update-profile" class="border px-4 py-4 rounded-xl mr-4 flex flex-col w-1/2">
        <h2 class="text-3xl font-bold mb-6">Update Profile</h2>

        <hr class="w-full">

        <form wire:submit="updateProfile">
            <div class="flex gap-3 mt-6">
                <label class="flex flex-col gap-1 w-1/2">
                    <span class="text-[15px] font-medium">First name</span>
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

                <label class="flex flex-col gap-1 w-1/2">
                    <span class="text-[15px] font-medium">Last name</span>
                    <input type="text" wire:model="form.last_name" @class([
                        'px-3 py-2 text-sm rounded-lg',
                        'border border-slate-300' => $errors->missing('form.last_name'),
                        'border-2 border-red-500' => $errors->has('form.last_name')
                    ])>
                    @error('form.last_name')
                        <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
                    @enderror
                </label>
            </div>

            <div class="flex gap-3 mt-4">

                <label class="flex flex-col gap-1 w-1/2">
                    <span class="text-[15px] font-medium">Email</span>
                    <input type="email" wire:model.blur="form.email" @class([
                        'px-3 py-2 text-sm rounded-lg',
                        'border border-slate-300' => $errors->missing('form.email'),
                        'border-2 border-red-500' => $errors->has('form.email')
                    ])>
                    @error('form.email')
                        <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
                    @enderror
                </label>

                <label class="flex flex-col gap-1 w-1/2">
                    <span class="text-[15px] font-medium">Username</span>
                    <input type="text" wire:model.blur="form.username" @class([
                        'px-3 py-2 text-sm rounded-lg',
                        'border border-slate-300' => $errors->missing('form.username'),
                        'border-2 border-red-500' => $errors->has('form.username')
                    ])>
                    @error('form.username')
                        <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
                    @enderror
                </label>
            </div>

            <div class="flex items-center justify-end pt-4">
                <a href="javascript:history.back()" class="w-fit text-center text-[15px] font-medium px-3">Go back</a>
                <button type="submit" class="w-fit text-center text-[15px] rounded-xl bg-blue-500 text-white px-4 py-1.5 font-medium disabled:cursor-not-allowed disabled:opacity-70">Save</button>
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

    <div id="reset-password" class="border px-4 py-4 rounded-xl pl-4 flex flex-col w-1/2">
        <h2 class="text-3xl font-bold mb-6">Change Password</h2>

        <hr class="w-full">

        <form wire:submit="changePassword">
            <div class="flex gap-3 mt-6">
                <label class="flex flex-col gap-1 w-full">
                    <span class="font-medium text-[15px]">Current password</span>
                    <input type="password" wire:model="current_password" class="px-3 text-lg py-1 border border-slate-300 rounded-lg">
                    @error('current_password')
                        <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
                    @enderror
                </label>
            </div>

            <div class="flex gap-3 mt-6">
                <label class="flex flex-col gap-1 w-1/2">
                    <span class="font-medium text-[15px]">New Password</span>
                    <input type="password" wire:model="new_password" class="px-3 text-lg py-1 border border-slate-300 rounded-lg">
                </label>

                <label class="flex flex-col gap-1 w-1/2">
                    <span class="font-medium text-[15px]">Confirm new password</span>
                    <input type="password" wire:model="new_password_confirmation" class="px-3 py-1.5 border border-slate-300 rounded-lg">
                </label>
            </div>

            @error('new_password')
                <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
            @enderror

            <div class="flex items-center justify-end pt-4">
                <a href="javascript:history.back()" class="w-fit text-center text-[15px] font-medium px-3">Go back</a>
                <button type="submit" class="w-fit text-center text-[15px] rounded-xl bg-blue-500 text-white px-4 py-1.5 font-medium disabled:cursor-not-allowed disabled:opacity-70">Change</button>
            </div>
        </form>

        <div class="flex justify-end" x-cloak>
            <div x-show = "$wire.showChanged"
                x-transition.out.opacity.duration.2000ms
                x-effect="if($wire.showChanged) setTimeout(() => $wire.showChanged = false, 3000)"
                class="flex gap-2 mt-4 items-center text-green-500 text-sm font-medium">
                <span>Password changed successfully!</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

</div>
