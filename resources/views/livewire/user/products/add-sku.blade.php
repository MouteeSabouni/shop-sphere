<div class="my-10 mx-20">
    <div class="flex flex-col font-medium text-sm mb-6">
        <span>• Please note that this page is for adding sub products.</span>
        <span>• If you wish to add a brand new product (different name and brand), you should go to the
        <a href="/products/create" class="text-blue-700 underline">add product</a> page.</span>
    </div>
    <div class="flex gap-4">
        <div class="flex flex-col gap-2 w-1/2">
            <div class="flex flex-col gap-0.5">
                <div class="flex items-end gap-1 text-sm">
                    <span class="font-medium">Product name:</span>
                    <div class="text-gray-500">
                        {{ $product->name }}
                    </div>
                </div>

                <div class="flex items-end gap-1 text-sm">
                    <span class="font-medium">Brand:</span>
                    <div class="text-gray-500">
                        {{ $product->brand->name }}
                    </div>
                </div>

                <div class="flex items-end gap-1 text-sm">
                    <span class="font-medium">Material:</span>
                    <div class="text-gray-500">
                        {{ $product->material }}
                    </div>
                </div>

                <div class="flex items-end gap-1 text-sm">
                    <span class="font-medium">Manufacturer:</span>
                    <div class="text-gray-500">
                        {{ $product->manufacturer }}
                    </div>
                </div>
            </div>

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

            <div class="mt-2">
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
                <label class="w-1/2">
                    <span>Color</span>
                    <input type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="color" required>
                </label>
                <label class="w-1/2">
                    <span>Quantity</span>
                    <input type="text" class="w-full border border-gray-300 px-2 py-1 rounded-lg text-sm" wire:model="quantity" required>
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

            <span>Categories</span>

            <div class="flex flex-wrap gap-x-1">
                @foreach($categories as $category)
                    <div class="flex items-center text-sm px-2 py-1 bg-gray-200 text-gray-700 w-fit rounded-lg">
                        {{ $category->name }}
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
        <button wire:click="addSku" class="px-4 py-2 text-lg bg-blue-600 text-white font-medium rounded-lg hover:scale-110">
            Add Sku
        </button>
    </div>
</div>
