<div class="flex items-center mt-1 border border-2 rounded-xl">
    <div class="contents gap-1">
        @foreach($order->items as $item)
                <img src="{{ $item->sku->images->first()->url }}" @class([
                    'object-contain px-4 w-[90px] h-[90px]',
                    'opacity-50' => $item->sku->status === 0
                    ])>
            @if($loop->iteration === 2) @break @endif
        @endforeach
    </div>

    <div class="flex flex-col justify-between p-3 w-full">
        <div class="flex justify-between items-center">
            <div class="flex gap-1 text-[13px]">
                <span class="font-medium">Order placed:</span>
                <span>{{ $order->updated_at->diffForHumans() }}</span>
            </div>
            <p class="tracking-tight text-black font-bold text-lg">${{ $order->total_price }}</p>
        </div>

        <div class="flex gap-1 text-[13px]">
            <span class="font-medium">Address:</span>
            <span>{{ $order->address->address_line }}</span>
        </div>

        <div class="flex justify-between items-center text-[12.5px] underline text-gray-600 text-[13px] gap-0.5">
            <a wire:navigate.hover href="/user/orders/{{$order->id}}">View order details</a>

            @if($order->status === 'Pending')
                <button wire:click="cancelOrder({{$order->id}})" wire:confirm="Cancel this order?">
                    Cancel order
                </button>
            @endif

            @if($order->status === 'Delivered')
                <button wire:click="requestReturn({{$order->id}})">
                    Request return
                </button>
            @endif

            @if($order->status === 'Return requested')
            <button wire:click="cancelReturnRequest({{$order->id}})">
                Cancel request
            </button>
        @endif
        </div>
    </div>
</div>
