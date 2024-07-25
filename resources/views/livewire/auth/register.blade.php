<div class="rounded-xl p-8 flex flex-col gap-6 w-2/3">
    <div>
        <h2 class="text-3xl font-bold mb-1">Let's start your journey!</h2>
        <span class="text-lg pb-2 text-slate-600">Sign up for a new account</span>
    </div>

    <hr class="w-[75%]">

    <form wire:submit="save">
        <div class="flex gap-3">
            <label class="flex flex-col gap-2 w-1/2">
                <span>First name</span>
                <input type="text" wire:model="form.first_name" @class([
                    'px-3 py-2 text-sm border border-slate-300 rounded-lg',
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

        <div class="flex gap-3 mt-2">
            <label class="flex flex-col gap-2 w-1/2">
                <span>Password</span>
                <input type="password" wire:model.blur="form.password" @class([
                    'px-3 py-2 text-sm border border-slate-300 rounded-lg',
                    'border border-slate-300' => $errors->missing('form.password'),
                    'border-2 border-red-500' => $errors->has('form.password')
                ])>
                @error('form.password')
                    <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
                @enderror
            </label>

            <label class="flex flex-col gap-2 w-1/2">
                <span>Confirm password</span>
                <input type="password" wire:model="form.password_confirmation" @class([
                    'px-3 py-2 text-sm border border-slate-300 rounded-lg',
                    'border border-slate-300' => $errors->missing('form.password_confirmation'),
                    'border-2 border-red-500' => $errors->has('form.password_confirmation')
                ])>
                @error('form.password_confirmation')
                    <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
                @enderror
            </label>
        </div>



        <div class="flex justify-between items-center pt-4">
            <div class="flex justify-start items-center text-sm">
                <label class="flex items-center">
                    <input type="checkbox" class="border" wire:model="tos">

                    <span class="pl-2 pr-1">I agree to the</span>
                </label>

                <div class="-pl-2">
                    <x-dialog wire:model="showModal">
                        <x-dialog.open>
                            <button type="button" class="underline text-blue-500">
                                terms of service.
                            </button>
                        </x-dialog.open>

                        <x-dialog.panel>
                            <h2 class="text-2xl font-bold text-slate-900">Terms Of Service</h2>

                            <div class="mt-5 text-gray-600">
                            <h3 class="font-bold text-lg text-slate-800 mt-4">Acceptance of Terms</h3>
                                <p class="mt-2">By signing up for and using this sweet app, you agree to be bound by these Terms of Service ("Terms"). If you do not agree with these Terms, please do not use the Service.</p>

                                <h3 class="font-bold text-lg text-slate-800 mt-4">Changes to Terms</h3>
                                <p class="mt-2">We reserve the right to update and change the Terms at any time without notice. Continued use of the Service after any changes shall constitute your consent to such changes.</p>

                                <h3 class="font-bold text-lg text-slate-800 mt-4">Use of the Service</h3>
                                <p class="mt-2">You must provide accurate and complete registration information when you sign up. You are responsible for maintaining the confidentiality of your password and are solely responsible for all activities resulting from its use.</p>

                                <h3 class="font-bold text-lg text-slate-800 mt-4">User Content</h3>
                                <p class="mt-2">You are responsible for all content and data you provide or upload to the Service. We reserve the right to remove content deemed offensive, illegal, or in violation of these Terms or any other policy.</p>

                                <h3 class="font-bold text-lg text-slate-800 mt-4">Limitation of Liability</h3>
                                <p class="mt-2">The Service is provided "as is". We make no warranties, expressed or implied, and hereby disclaim all warranties, including without limitation, implied warranties of merchantability, fitness for a particular purpose, or non-infringement.</p>

                                <h3 class="font-bold text-lg text-slate-800 mt-4">Termination</h3>
                                <p class="mt-2">We reserve the right to suspend or terminate your account at any time for any reason, with or without notice.</p>

                                <h3 class="font-bold text-lg text-slate-800 mt-4">Governing Law</h3>
                                <p class="mt-2">These Terms shall be governed by the laws of the land of fairy tale creatures, without respect to its conflict of laws principles.</p>

                                <h3 class="font-bold text-lg text-slate-800 mt-4">Miscellaneous</h3>
                                <p class="mt-2">If any provision of these Terms is deemed invalid or unenforceable, the remaining provisions shall remain in effect.</p>

                                <h3 class="font-bold text-lg text-slate-800 mt-4">Contact</h3>
                                <p class="mt-2">For any questions regarding these Terms, please contact us at dontcontactus@ever.com.</p>
                            </div>
                        </x-dialog.panel>
                    </x-dialog>
                </div>
            </div>

            <button type="submit" class="w-fit text-center rounded-xl bg-blue-500 text-white px-6 py-2 font-medium">Register</button>
        </div>
        @if(session('tos'))
            <span class="text-sm text-red-500 font-medium">{{ session('tos') }}</span>
        @endif
    </form>
</div>
