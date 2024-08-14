<?php

namespace App\Livewire\User\Orders;

use Livewire\Component;
use App\Models\Order;

class Show extends Component
{
    public Order $order;

    public function mount()
    {
        if(!$this->order->user_id === auth()->id())
        {
            return redirect('/user/orders');
        }
    }

    public function render()
    {
        return view('livewire.user.orders.show', [
            'title' => 'ShopSphere — Order #' . $this->order->id,
            'order' => $this->order->withCount('items'),
            'orderItems' => $this->order->items()
            ->with('sku.images', 'sku.product.seller', 'sku.product.brand')
            ->get()
        ]);
    }
}
