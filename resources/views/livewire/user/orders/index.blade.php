<div class="my-[10px] mx-20">
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    @if($orders->count() > 0)
        <div class="flex gap-x-4">
            <div class="w-full">
                <div class="grid grid-cols-2 gap-x-6">
                    @foreach($orders as $order)
                        <div class="py-3">
                            <div class="flex items-center gap-1 font-medium">
                                <span>Order #{{ $order->id }}</span>
                                <span class="scale-90">—</span>
                                <span class="text-[14.5px]">{{ $order->items->count() }} product(s)</span>
                                <span class="scale-90">—</span>
                                <span class="text-[14.5px]">{{ $order->totalItems() }} item(s)</span>

                                <x-user.orders.status :$order />
                            </div>

                            <x-user.orders.index.card wire:key="{{$order->id}}" :$order />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <x-user.orders.empty />
    @endif
</div>
