<section id="testimonies" class="py-12 px-20 bg-gray-100">
    <div class="transition duration-500 ease-in-out transform scale-100 translate-x-0 translate-y-0 opacity-100">
        <div class="mb-12 md:text-center">
            <h1 class="text-2xl font-extrabold md:text-center md:text-5xl opacity-80">
                Cutsomers' testimonials
            </h1>
        </div>
    </div>

    <div class="flex flex-col flex-wrap h-[425px] gap-6">
        @foreach($testimonies as $testimony)
            <div class="text-sm p-4 w-[32%] leading-none rounded-lg bg-white flex flex-col justify-between">
                <div class="flex flex-col items-center">
                    <h3 class="italic text-lg font-semibold text-gray-600">{{$testimony->user->first_name}}</h3>
                    <p class="italic text-gray-500">{{$testimony->user_title}}</p>
                    <p class="leading-normal text-center italic text-gray-700 mt-6">{{$testimony->comment}}</p>
                </div>
                <p class="flex justify-end text-[11px] italic text-gray-400 mt-6">{{$testimony->created_at}}</p>
            </div>
        @endforeach
    </div>
    @auth
        @if(auth()->user()->orders()->count() > 7 && auth()->user()->testimony()->count() === 0)
            <x-home.add-testimony />
        @endif
    @endauth
</section>
