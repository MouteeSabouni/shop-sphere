<div class="rounded-xl my-10 mx-20 flex flex-col gap-6 w-2/3">
    <div>
        <h2 class="text-3xl font-bold mb-1">Enter the widest shop sphere!</h2>
        <span class="text-lg pb-2 text-slate-600">Login to your account</span>
    </div>

    <hr class="w-[75%]">

    <form wire:submit="login">
        <div class="flex flex-col gap-3 mt-2">
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
                <span>Password</span>
                <input type="password" wire:model="form.password" @class([
                    'px-3 py-2 text-sm border border-slate-300 rounded-lg',
                    'border border-slate-300' => $errors->missing('form.password'),
                    'border-2 border-red-500' => $errors->has('form.password')
                ])>

                @error('form.password')
                    <span class="text-sm pb-2 text-red-500 font-medium">{{ $message }}</span>
                @enderror
                @if(session('login-failed'))
                    <span class="text-sm text-red-500 font-medium">{{ session('login-failed') }}</span>
                @endif

            </label>
            <div class="w-1/2 flex justify-end pt-4">
                <button type="submit" class="text-center rounded-xl bg-blue-500 text-white px-6 py-2 font-medium">Login</button>
            </div>
        </div>
    </form>
</div>
