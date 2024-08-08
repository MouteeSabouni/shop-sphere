<div class="text-sm">
    <div class="mb-3">
            This order has {{ $order->totalItems() }} item(s) for {{ $order->items->count() }} product(s).
    </div>
    <div class="flex flex-col gap-1">
        @foreach($orderItems as $item)
            <div class="flex justify-between">
                <div class="flex space-x-1">
                    <div class="flex gap-1">
                        <span class="font-medium">
                            ${{ $item->sku->price }}
                        </span>
                        <span>
                            ({{ $item->quantity }})
                        </span>
                    </div>
                </div>
                <span>
                    ${{ $item->sku->price * $item->quantity }}
                </span>
            </div>
        @endforeach
    </div>

    <span class="flex justify-end mt-1 font-bold text-base tracking-tight">
        Total = ${{ $order->total_price }}
    </span>
</div>
