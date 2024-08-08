<?php

namespace App\Livewire\User\Orders;

use Livewire\Component;
use App\Models\Order;

class Index extends Component
{
    public function cancelOrder($orderId)
    {
        $order = auth()->user()->orders()->where('id', $orderId)->first();

        foreach($order->items as $orderItem)
        {
            $orderItem->sku->quantity += $orderItem->quantity;
            $orderItem->sku->status = 1;
            $orderItem->sku->save();
        }

        $order->status = 'Cancelled';
        $order->save();
    }

    public function requestReturn($orderId)
    {
        $order = auth()->user()->orders()->where('id', $orderId)->first();

        $order->status = 'Return requested';
        $order->save();
    }

    public function cancelReturnRequest($orderId)
    {
        $order = auth()->user()->orders()->where('id', $orderId)->first();

        $order->status = 'Delivered';
        $order->save();
    }

    public function render()
    {
        return view('livewire.user.orders.index', [
            'title' => 'ShopSphere — Orders',
            'orders' => Order::where('status', '!=', 'draft')->latest()->get(),
        ]);
    }
}
