<x-dialog wire:model="showModal">
    <x-dialog.open>
        <button type="button">
            <img src="/images/button-icons/info.svg" class="h-4 w-4">
        </button>
    </x-dialog.open>

    <x-dialog.panel>
        <h2 class="text-xl font-bold text-slate-900">Strikethrough Pricing on Shopsphere.com</h2>

        <div class="mt-5 text-sm flex flex-col gap-3 text-gray-600">
            <p>Items on Shopsphere.com may display a strikethrough price in search results and on product display pages.</p>

            <p>The strikethrough price is either a Was Price, a Bundle Price, or a List Price.</p>

            <p>A Was Price is either the 90-day median price paid by customers for the item (excluding special promotions like holiday campaigns, limited time deals, rollbacks, and clearance) on Shopsphere.com or the median price offered by ShopSphere or Marketplace sellers for the item on Shopsphere.com for at least 28 out of the last 90 days (excluding special promotions like holiday campaigns, limited time deals, rollbacks, and clearance).</p>

            <p>A Bundle Price is the sum of the current individual prices offered by ShopSphere for the components comprising the bundle.</p>

            <p>A List Price is the manufacturer's suggested retail price for the item.</p>

            <p>We reserve the right to suspend or terminate your account at any time for any reason, with or without notice.</p>

            <p>Except for books, Shopsphere.com uses List Price as the basis for a strikethrough price if the item was purchased by Shopsphere.com customers at that price or offered by other retailers at or above that price in the past 90 days or 180 days for seasonal items.</p>

            <p>List Price may not be the prevailing market price for an item.</p>
        </div>
    </x-dialog.panel>
</x-dialog>
