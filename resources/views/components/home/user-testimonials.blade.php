<section id="testimonies" class="py-10 px-20 bg-gray-100">
    <div class="transition duration-500 ease-in-out transform scale-100 translate-x-0 translate-y-0 opacity-100">
        <div class="mb-8 md:mb-16 md:text-center">
            <h1 class="text-2xl font-extrabold md:text-center md:text-5xl opacity-80">
                Cutsomers' testimonials
            </h1>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8 opacity-80">
        <ul class="space-y-8">
            <li class="text-sm leading-6">
                <div class="relative group">
                    <div class="absolute transition rounded-lg opacity-25 -inset-0.5 bg-gradient-to-b from-blue-600 to-pink-400 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
                    </div>
                    <div class="relative p-6 space-y-6 leading-none rounded-lg bg-white ring-1 ring-gray-900/5">
                        <div class="flex flex-col items-center">
                            <h3 class="italic text-lg font-semibold text-gray-600">{{$users[0]['first_name']}}</h3>
                            <p class="italic text-gray-500">{{$testimonies[0]['user_title']}}</p>
                            <p class="leading-normal text-center italic text-gray-700 mt-6">{{$testimonies[0]['comment']}}</p>
                        </div>
                        <p class="flex justify-end text-[11px] italic text-gray-400 mt-6">{{$testimonies[0]['created_at']}}</p>
                    </div>
                </div>
            </li>
            <li class="text-sm leading-6">
                <div class="relative group">
                    <div class="absolute transition rounded-lg opacity-25 -inset-0.5 bg-gradient-to-b from-blue-600 to-pink-400 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
                    </div>
                    <div class="relative p-6 space-y-6 leading-none rounded-lg bg-white ring-1 ring-gray-900/5">
                        <div class="flex flex-col items-center">
                            <h3 class="italic text-lg font-semibold text-gray-600">{{$users[1]['first_name']}}</h3>
                            <p class="italic text-gray-500">{{$testimonies[1]['user_title']}}</p>
                            <p class="leading-normal text-center italic text-gray-700 mt-6">{{$testimonies[1]['comment']}}</p>
                        </div>
                        <p class="flex justify-end text-[11px] italic text-gray-400 mt-6">{{$testimonies[1]['created_at']}}</p>
                    </div>
                </div>
            </li>
        </ul>

        <ul class="hidden space-y-8 sm:block">
            <li class="text-sm leading-6">
                <div class="relative group">
                    <div class="absolute transition rounded-lg opacity-25 -inset-0.5 bg-gradient-to-b from-blue-600 to-pink-400 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
                    </div>
                    <div class="relative p-6 space-y-6 leading-none rounded-lg bg-white ring-1 ring-gray-900/5">
                        <div class="flex flex-col items-center">
                            <h3 class="italic text-lg font-semibold text-gray-600">{{$users[2]['first_name']}}</h3>
                            <p class="italic text-gray-500">{{$testimonies[2]['user_title']}}</p>
                            <p class="leading-normal text-center italic text-gray-700 mt-6">{{$testimonies[2]['comment']}}</p>
                        </div>
                        <p class="flex justify-end text-[11px] italic text-gray-400 mt-6">{{$testimonies[2]['created_at']}}</p>
                    </div>
                </div>
            </li>
            <li class="text-sm leading-6">
                <div class="relative group">
                    <div class="absolute transition rounded-lg opacity-25 -inset-0.5 bg-gradient-to-b from-blue-600 to-pink-400 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
                    </div>
                    <div class="relative p-6 space-y-6 leading-none rounded-lg bg-white ring-1 ring-gray-900/5">
                        <div class="flex flex-col items-center">
                            <h3 class="italic text-lg font-semibold text-gray-600">{{$users[3]['first_name']}}</h3>
                            <p class="italic text-gray-500">{{$testimonies[3]['user_title']}}</p>
                            <p class="leading-normal text-center italic text-gray-700 mt-6">{{$testimonies[3]['comment']}}</p>
                        </div>
                        <p class="flex justify-end text-[11px] italic text-gray-400 mt-6">{{$testimonies[3]['created_at']}}</p>
                    </div>
                </div>
            </li>
        </ul>

        <ul class="hidden space-y-8 lg:block">
            <li class="text-sm leading-6">
                <div class="relative group">
                    <div class="absolute transition rounded-lg opacity-25 -inset-0.5 bg-gradient-to-b from-blue-600 to-pink-400 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
                    </div>
                    <div class="relative p-6 space-y-6 leading-none rounded-lg bg-white ring-1 ring-gray-900/5">
                        <div class="flex flex-col items-center">
                            <h3 class="italic text-lg font-semibold text-gray-600">{{$users[4]['first_name']}}</h3>
                            <p class="italic text-gray-500">{{$testimonies[4]['user_title']}}</p>
                            <p class="leading-normal text-center italic text-gray-700 mt-6">{{$testimonies[4]['comment']}}</p>
                        </div>
                        <p class="flex justify-end text-[11px] italic text-gray-400 mt-6">{{$testimonies[4]['created_at']}}</p>
                    </div>
                </div>
            </li>
            <li class="text-sm leading-6">
                <div class="relative group">
                    <div class="absolute transition rounded-lg opacity-25 -inset-0.5 bg-gradient-to-b from-blue-600 to-pink-400 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
                    </div>
                    <div class="relative p-6 space-y-6 leading-none rounded-lg bg-white ring-1 ring-gray-900/5">
                        <div class="flex flex-col items-center">
                            <h3 class="italic text-lg font-semibold text-gray-600">{{$users[5]['first_name']}}</h3>
                            <p class="italic text-gray-500">{{$testimonies[5]['user_title']}}</p>
                            <p class="leading-normal text-center italic text-gray-700 mt-6">{{$testimonies[5]['comment']}}</p>
                        </div>
                        <p class="flex justify-end text-[11px] italic text-gray-400 mt-6">{{$testimonies[5]['created_at']}}</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    @if(auth()->user()->orders()->count() > 7 && auth()->user()->reviews()->count() === 0)
        <x-dialog wire:model="showModal">
            <x-dialog.open>
                <div class="flex justify-center mt-10">
                    <button class="border border-2 border-black hover:opacity-80 hover:scale-110 font-bold text-xl rounded-full px-8 py-3">Leave us a review</button>
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
    @endif
</section>
