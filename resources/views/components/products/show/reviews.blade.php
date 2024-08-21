@if($sku->isRated())
    <div class="flex flex-col w-full gap-1 mt-4" id="reviews">
        <span class="font-bold">
            Reviews
        </span>
        <span class="text-sm">
            Click on a review to see its details.
        </span>
        <div class="grid grid-cols-3 gap-4 py-2">
            @foreach($sku->reviews as $review)
                <x-dialog wire:model="showModal">
                    <x-dialog.open>
                        <button class="w-full">
                            <div class="flex flex-col justify-between border border-2 rounded-2xl px-3 py-3 gap-4 h-fit hover:border hover:border-2 hover:border-blue-600 rounded-2xl transition-all duration-300">
                                <div class="flex justify-between">
                                    <div class="flex items-center">
                                        @for ($i = $review->rating; $i > 0; $i--)
                                            <img src="/star-solid.svg" class="w-3 h-3">
                                        @endfor
                                    </div>

                                    <span class="font-medium text-[11px]">
                                        {{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}
                                    </span>
                                </div>
                            </div>
                        </button>
                    </x-dialog.open>

                    <x-dialog.panel>
                        <h2 class="text-xl font-bold text-slate-900">{{$review->rating}}-star review</h2>

                        <div class="flex items-center mt-2">
                            @for ($i = $review->rating; $i > 0; $i--)
                                <img src="/star-solid.svg" class="w-5 h-5">
                            @endfor
                        </div>

                        <div class="mt-5 text-sm text-gray-600">
                            <h3  class="text-sm">
                                {{ $review->comment }}
                            </h3>
                            <div class="flex gap-1 mt-4">
                                <span class="text-gray-600 font-medium italic">
                                    {{ $review->user->fullName() }}
                                </span>
                                <span class="italic">on</span>
                                <span class="text-gray-600 font-medium italic">
                                    {{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}
                                </span>
                            </div>
                        </div>
                    </x-dialog.panel>
                </x-dialog>
            @endforeach
        </div>
    </div>
@endif
