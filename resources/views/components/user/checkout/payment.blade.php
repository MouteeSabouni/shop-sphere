<span class="font-bold text-xl mb-2">
    How do you want to pay?
</span>
<div class="flex flex-col">
    <button wire:click="choosePayment('COD')"
        @class([
            'flex flex-col text-left my-1.5 border border-2 hover:border-blue-600 rounded-xl py-1.5 px-3 transition-all duration-200 text-[14.5px]',
            'border-blue-600' => 'COD' === $order->payment_method
        ])
        {{ 'COD' === $order->payment_method ? 'disabled' : ''}}
    >
        <span class="font-medium mb-1">Cash on delivery (COD)</span>
        <span class="text-[13px]">Pay for your order with cash when it is delivered to your doorstep.</span>
    </button>
    <button wire:click="choosePayment('VOD')"
        @class([
            'flex flex-col text-left my-1.5 border border-2 hover:border-blue-600 rounded-xl py-1.5 px-3 transition-all duration-200 text-[14.5px]',
            'border-blue-600' => 'VOD' === $order->payment_method
        ])
        {{ 'VOD' === $order->payment_method ? 'disabled' : ''}}
    >
        <span class="font-medium mb-1">Visa on delivery</span>
        <span class="text-[13px]">Use your Visa card to pay when your order arrives at your address.</span>
    </button>
    <button wire:click="choosePayment('Installments')"
        @class([
            'flex flex-col text-left my-1.5 border border-2 hover:border-blue-600 rounded-xl py-1.5 px-3 transition-all duration-200 text-[14.5px]',
            'border-blue-600' => 'Installments' === $order->payment_method
        ])
        {{ 'Installments' === $order->payment_method ? 'disabled' : ''}}

    >
        <div class="flex flex-col items-start">
            <span class="font-medium mb-1">Pay in installments</span>

            <div class="flex text-[13px] gap-1">
                <span>As low as</span>
                <span class="font-bold">${{ number_format(auth()->user()->cartTotal()/36, 2) }}/mo</span>
                <span>with</span>
                <img src="/images/affirm.png" class="h-[14.5px]">
            </div>
            <span class="text-[13px]">
                Spread the cost of your purchase over 36 months with Affirm.
            </span>
        </div>
    </button>
</div>
