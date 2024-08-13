<div class="flex">
    <div class="w-[266.477px]">
        <x-products.index.filter-placeholder />
    </div>
    <div class="flex gap-6 grid grid-cols-3 w-4/5 my-10 ml-7">
        @foreach (range(0, 3) as $i)
            <div class="flex flex-col">
                <div class="w-80 h-80 animate-pulse bg-gray-200 rounded-xl">&nbsp;</div>

                <div class="pt-2 rounded-xl w-80">
                    <div class="flex justify-between w-full">
                        <div class="py-0.5 animate-pulse bg-gray-200 w-[100px] rounded-2xl">&nbsp;</div>
                        <div class="py-0.5 animate-pulse bg-gray-200 w-[100px] rounded-2xl">&nbsp;</div>
                    </div>

                    <div class="mt-2 w-full h-12 rounded-xl text-sm py-0.5 animate-pulse bg-gray-200">&nbsp;</div>

                    <div class="flex space-x-2 my-2">
                        @foreach (range(0, 2) as $i)
                            <div class="w-1/3 animate-pulse bg-blue-200 rounded-2xl py-0.5">&nbsp;</div>
                        @endforeach
                    </div>

                    <div class="flex justify-between">
                        <div class="w-1/3 animate-pulse bg-gray-200 rounded-2xl py-0.5">&nbsp;</div>
                        <div class="w-fit px-3 animate-pulse bg-gray-200 rounded-full">&nbsp;</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
