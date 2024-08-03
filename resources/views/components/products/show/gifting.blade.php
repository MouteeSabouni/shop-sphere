<div class="flex items-center gap-1">
    <img src="/images/gifting-icon.svg" class="w-4 h-4 text-blue-500">
    <span class="text-xs font-bold pr-0.5">This item is gift eligible</span>
    <x-dialog wire:model="showModal">
        <x-dialog.open>
            <button type="button" class="text-xs underline text-gray-500">
                Learn more
            </button>
        </x-dialog.open>

        <x-dialog.panel>
            <h2 class="text-xl font-bold text-slate-900">About gift eligibility</h2>

            <div class="mt-5 text-sm flex flex-col text-gray-600">
                <h3 class="font-bold text-lg text-slate-800 mt-4">Make their day with a gift from ShopSphere.</h3>

                <h3 class="font-bold text-lg text-slate-800 mt-4">Marking your order as a gift lets you:</h3>
                <p class="mt-2">• Include a digital gift receipt with prices hidden.</p>
                <p>• Send a gift message by email (not available for pickup orders).</p>

                <h3 class="font-bold text-lg text-slate-800 mt-4">Does it arrive in a ShopSphere box?</h3>
                <p class="mt-2">• Gift eligible - items that are shipped will be packaged in a Walmart box when possible.
                <p>• Gift eligible: original packaging - items cannot be packaged in a Walmart box, which may reveal the contents.</p>
                <p>• Delivery from store and pickup items will not be packaged in a Walmart box.</p>

                <h3 class="font-bold text-lg text-slate-800 mt-4">Not eligible for gift treatments</h3>
                <p class="mt-2">We are not able to apply gift treatments to items that are not shipped and sold by Walmart.</p>

                <h3 class="font-bold text-lg text-slate-800 mt-4">Here's what to expect</h3>
                <p class="mt">1. We'll send an email when the gift ships</p>
                <p class="mt">2. After delivery, we'll share your gift message</p>
                <p class="mt">3. We'll include a gift receipt for easy returns</p>
            </div>
        </x-dialog.panel>
    </x-dialog>
</div>

