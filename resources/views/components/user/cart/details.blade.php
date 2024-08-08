<div class="text-[13px]">
    <div class="mb-3">
            You have {{ auth()->user()->itemsInCart() }} item(s) for {{ auth()->user()->cart->count() }} product(s).
    </div>
    <div class="flex flex-col gap-1">
        @foreach($cartItems as $item)
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
        Total = ${{ auth()->user()->cartTotal() }}
    </span>
</div>
