<div class="w-full">
    <div class="px-20 pt-8 pb-12" id="contact-us">
        <div class="flex justify-between">
            <div class="w-2/5">
                <p style="font-size: 40px; font-weight: bold; letter-spacing: -0.05rem">
                    Get in touch
                </p>
                <div class="flex flex-col text-[15px] pt-6">
                    <span class="font-medium">Damascus, Mazzeh, Govt. Bldg. #6</span>
                    <span>Phone: +963 938-560-806</span>
                    <span>Email: contact-sy@dandy.com</span>
                </div>
                <div class="flex flex-col text-[15px] pt-4">
                    <span class="font-medium">Dubai, Jumeirah Lake Towers</span>
                    <span>Phone: +971 55-301-3137</span>
                    <span>Email: contact-uae@dandy.com</span>
                </div>
                <div class="flex flex-col text-[15px] pt-4">
                    <span class="font-medium">108 Winthrop Ave, Lawrence, Maine 01843</span>
                    <span>Phone: +1 (978) 691-5448</span>
                    <span>Email: contact-usa@dandy.com</span>
                </div>
            </div>

            <div class="flex flex-col w-3/5">
                <p style="font-size: 40px; font-weight: bold; letter-spacing: -0.05rem">
                    Send us a letter
                </p>
                <div class="flex mt-4 gap-4 my-4">
                    <div class="relative z-0 w-full">
                        <input type="text" wire:model="user_name" name="user_name" placeholder=" " required
                            @class([
                                'block py-2 px-2 w-full rounded-lg text-sm text-gray-900 bg-transparent appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                                'border border-gray-300' => $errors->missing('user_name'),
                                'border border-red-600' => $errors->has('user_name'),
                            ])
                        />
                        <label for="user_name" class="text-[15px] peer-focus:font-medium absolute left-2 {{ $errors->has('message') ? 'text-red-600 font-medium' : 'text-gray-500' }} duration-300 transform -translate-y-7 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-7">
                            Your name
                        </label>
                        @error('user_name')
                            <span class='text-sm text-red-600 font-medium'>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="relative z-0 w-full">
                        <input type="email" wire:model="email" name="email" placeholder=" " required
                            @class([
                                'block py-2 px-2 w-full rounded-lg text-sm text-gray-900 bg-transparent appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                                'border border-gray-300' => $errors->missing('email'),
                                'border border-red-600' => $errors->has('email'),
                            ])
                        />
                        <label for="email" class="text-[15px] peer-focus:font-medium absolute left-2 {{ $errors->has('message') ? 'text-red-600 font-medium' : 'text-gray-500' }} duration-300 transform -translate-y-7 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-7">
                            Email address
                        </label>
                        @error('email')
                            <span class='text-sm text-red-600 font-medium'>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="relative z-0 w-full">
                    <textarea type="message" wire:model="message" name="message" rows="6" placeholder=" " required
                        @class([
                            'block py-2 px-2 w-full resize-none no-scrollbar rounded-lg text-sm text-gray-900 bg-transparent appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                            'border border-gray-300' => $errors->missing('message'),
                            'border border-red-600' => $errors->has('message'),
                        ])
                    >
                    </textarea>
                    <label for="message" class=" text-[15px] peer-focus:font-medium absolute left-2 {{ $errors->has('message') ? 'text-red-600 font-medium' : 'text-gray-500' }} duration-300 transform -translate-y-7 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:translate-y-32">
                        Your message
                    </label>
                    @error('message')
                        <span class='text-sm text-red-600 font-medium'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <div x-cloak
                        x-show="$wire.messageSent"
                        x-transition.enter.opacity.duration.1000ms
                        x-transition.out.opacity.duration.1500ms
                        class="flex gap-0.5 items-center justify-end w-fit bg-green-100 text-green-600 rounded-lg px-3 py-1 mr-3 text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="mr-2">Message sent!</span>
                        <button class="hover:bg-green-200 rounded" wire:click="$set('messageSent', false)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <button wire:click="sendMessage" class="mt-4 px-4 py-1.5 font-medium rounded-lg bg-blue-600 text-white">
                        Send
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
