<div class="my-10 mx-20">
    <div class="flex flex-col font-medium text-sm mb-6">
        <span>• Please note that this page is only for creating brand new products.</span>
        <span>• If you wish to add sub products (different color or size) to an existing product you previously published, you should go to the
        <a href="/user/products" class="text-blue-700 underline">add items</a> page.</span>
    </div>
    <div class="flex gap-4">
        <div class="flex flex-col gap-2 w-1/2">
            <div>
                <label>
                    <span>Product name</span>
                    <span class="text-sm text-gray-500">(do not include color, size, memory, etc. Be general)</span>
                    <input placeholder="Apple iPad 2022 Pro M2 Processor, iPhone 15 Pro Max" type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="product_name" required>
                </label>
            </div>

            <div class="flex justify-between gap-2">
                <label class="w-1/3">
                    <span>Brand</span>
                    <input type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="brand_name" required>
                </label>
                <label class="w-1/3">
                    <span>Color</span>
                    <input type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="color" required>
                </label>
                <label class="w-1/3">
                    <span>Quantity</span>
                    <input type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="quantity" required>
                </label>
            </div>

            <div class="flex justify-between gap-2">
                <label class="w-1/2">
                    <span>Material</span>
                    <input type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="material" required>
                </label>
                <label class="w-1/2">
                    <span>Manufacturer</span>
                    <input type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="manufacturer" required>
                </label>
            </div>

            <div>
                <label>
                    <span>Product description</span>
                    <textarea type="text" rows="4" class="resize-none w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="description" required></textarea>
                </label>
            </div>

            <div>
                <input class="text-sm" type="file" wire:model="photos" multiple>
            </div>

            <div class="flex flex-wrap gap-2">
                @if ($photos)
                    @foreach ($photos as $photo)
                        @if($photo->isPreviewable())
                            <img src="{{ $photo->temporaryUrl() }}" class="object-contain w-28 h-28">
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="flex flex-col gap-2 w-1/2">
            <div class="flex justify-between gap-2">
                <label class="w-2/3">
                    <span>SKU code</span>
                    <span class="text-sm text-gray-500">(format: aa11bb22)</span>
                    <input type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="code" required>
                </label>
                <label class="w-1/3">
                    <span>Price</span>
                    <span class="text-sm text-gray-500">($)</span>
                    <input type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="price" required>
                </label>
            </div>

            <div class="flex gap-2">
                <label class="w-1/4">
                    <span>Weight</span>
                    <span class="text-sm text-gray-500">(g)</span>
                    <input type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="weight" required>
                </label>
                <label class="w-1/4">
                    <span>Width</span>
                    <span class="text-sm text-gray-500">(cm)</span>
                    <input type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="width" required>
                </label>
                <label class="w-1/4">
                    <span>Height</span>
                    <span class="text-sm text-gray-500">(cm)</span>
                    <input type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="height" required>
                </label>
                <label class="w-1/4">
                    <span>Thickness</span>
                    <span class="text-sm text-gray-500">(cm)</span>
                    <input type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="thickness" required>
                </label>
            </div>

            <div>
                <label>
                    <span>Warranty</span>
                    <span class="text-sm text-gray-500">(if applicable)</span>
                    <input type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="warranty" required>
                </label>
            </div>

            <div>
                <label>
                    <span>Custom specifications/features</span>
                    <div class="flex gap-2">
                        <input type="text" placeholder="Name (e.g. Display rate)" class="w-[43%] border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="attribute_name" required>
                        <input type="text" placeholder="Value (e.g. 144Hz)" class="w-[43%] border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="attribute_value" required>
                        <button wire:click="addNewAttribute" class="w-[14%] px-2 py-1 rounded-lg bg-blue-600 text-sm font-medium text-white">Add</button>
                    </div>
                </label>
            </div>

            <div class="flex flex-wrap gap-x-1">
                @foreach($addedAttributes as $attributeName => $attributeValue)
                    <div class="flex items-center px-2 py-1 bg-blue-100 text-blue-600 w-fit rounded-lg mt-2">
                        <span class="text-sm">{{ $attributeName }}:</span>
                        <span class="text-sm pl-1"> {{ $attributeValue }}</span>
                        <button class="hover:bg-blue-200 rounded ml-2 p-0.5" wire:click="removeAttribute('{{$attributeName}}', '{{$attributeValue}}')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>

            <div>
                <label>
                    <span>Categories</span>
                    <span class="text-sm text-gray-500">(press enter to add)</span>
                    <input type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:keydown.enter="addNewCategory" wire:model="category_name" required>
                </label>
            </div>

            <div class="flex flex-wrap gap-x-1">
                @foreach($selectedCategories as $selectedCategory)
                    <div class="flex items-center px-2 py-1 bg-blue-100 text-blue-600 w-fit rounded-lg mt-2">
                        <span class="text-sm">{{ $selectedCategory->name }}</span>
                        <button class="hover:bg-blue-200 rounded ml-2 p-0.5" wire:click="removeCategory({{ $selectedCategory->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="flex flex-wrap items-center gap-2 mt-2">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-sm text-red-600 font-medium bg-red-200 rounded-lg px-2 py-1 w-fit">
                    {{ $error }}
                </p>
            @endforeach
        @endif
    </div>
    <div class="flex justify-center mt-8">
        <button wire:click="addProduct" class="px-4 py-2 text-lg bg-blue-600 text-white font-medium rounded-lg hover:scale-110">
            Publish Product
        </button>
    </div>
</div>
