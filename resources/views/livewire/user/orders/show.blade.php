<div class="my-[10px] mx-16">
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="flex gap-1.5">
        <div class="text-xl font-bold">Order #{{$order->id}} — {{$orderItems->count()}} item(s)</div>

        <x-user.orders.status :$order />
    </div>

    <div class="flex gap-x-4 mt-4">
        <div class="w-2/3">
            <div class="grid grid-cols-1 gap-6">
                @foreach($orderItems as $item)
                    <x-user.orders.show.card wire:key="{{$item->sku->id}}" :$item :sku="$item->sku" :product="$item->sku->product" />
                @endforeach
            </div>
        </div>

        <div class="w-1/3 sticky top-20 self-start">
            <div class="border border-2 rounded-3xl px-3 py-4">
                <div class="flex flex-col">
                    <div class="flex flex-col items-center gap-2 text-[13px]">
                        We hope you had the best shopping experience.
                    </div>
                </div>

                <hr class="my-3">

                <x-user.orders.show.details :$order :$orderItems />
            </div>
        </div>
    </div>
</div>
