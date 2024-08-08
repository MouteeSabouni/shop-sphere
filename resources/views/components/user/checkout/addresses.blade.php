<div class="flex flex-col">
    @foreach(auth()->user()->addresses()->latest()->get() as $address)
    <div @class([
        'flex items-center justify-between my-1.5 border border-2 rounded-xl py-2 px-3',
        'border-blue-600' => $order->address_id === $address->id,
    ])>
        <div class="flex flex-col gap-1">
            <span class="font-medium text-[14.5px]">{{ $address->name }}</span>
            <span class="text-[13.5px]">{{ $address->address_line }} ({{ $address->city }})</span>
            <a href="/user/addresses/{{$address->id}}" class="underline text-[12.5px]">Edit this address</a>
        </div>
        @if($order->address_id !== $address->id)
            <button class="mr-2 opacity-50" wire:click="chooseAddress({{$address->id}})">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="gray" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </button>
        @elseif($order->address_id === $address->id)
            <button class="mr-2" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="blue" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </button>
        @endif
    </div>
    @endforeach
</div>
