<div @class([
    'flex items-center w-fit px-2 py-0.5 rounded text-[12.5px] font-medium gap-0.5 opacity-90',
    'bg-gray-200' => $order->status === 'Pending' || $order->status === 'Return requested',
    'bg-sky-200' => $order->status === 'Out for delivery',
    'bg-green-200' => $order->status === 'Delivered',
    'bg-red-200' => $order->status === 'Cancelled',
    'bg-purple-200' => $order->status === 'Returned',
    ])
>
    <img src="{{$order->statusIcon()}}" class="w-[16px] h-[16px]">
    <span>{{ $order->status }}</span>
</div>
