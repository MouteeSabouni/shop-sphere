<div class="flex my-10 mx-20 space-x-4">
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    <div class="w-1/2 flex flex-col">
        <x-user.checkout.delivery :$order />

        <div class="space-y-2">
            <span class="text-xl font-bold">Choose an address</span>

            <x-user.checkout.addresses :$order />
        </div>

    </div>
    <div class="w-1/2 flex flex-col">

        <x-user.checkout.payment :$order />

        <div class="flex items-center justify-between">
            <span class="text-xl font-bold">Total = ${{ $order->total_price }}</span>

            <button wire:confirm="Have you checked delivery, address, and payment?" wire:click="placeOrder" class="flex flex-col items-center w-1/2 bg-blue-600 text-white mt-1.5 font-medium rounded-full py-1.5">
                Place your order
            </button>
        </div>
    </div>
</div>
