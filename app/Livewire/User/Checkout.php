<?php

namespace App\Livewire\User;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Address;
use Livewire\Component;
use App\Models\OrderItem;
use App\Livewire\Traits\Choosable;

class Checkout extends Component
{
    use Choosable;

    public Order $order;

    public $chosenAddress;
    public $chosenDelivery;
    public $chosenPayment;

    public function mount()
    {
        $this->ensureUserHasAddresses();

        $this->ensureUserHasItemsInCart();
    }

    public function saveOrderDetails()
    {
        $this->validateOrderDetails();

        $this->order = Order::firstOrCreate(
            ['user_id' => auth()->id(), 'status' => 'draft'],
            [
                'user_id' => auth()->id(),
                'status' => 'draft',
                'payment_method' => $this->chosenPayment ?? 'COD',
                'address_id' => $this->chosenAddress ?? auth()->user()->addresses()->latest()->first()->id,
                'delivery_method' => $this->chosenDelivery ??  'Home Delivery',
                'total_price' => auth()->user()->cartTotal(),
            ]
        );
    }

    public function validateOrderDetails()
    {
        return request()->validate([
            $this->chosenPayment => 'in:COD,VOD,Installment',
            $this->chosenDelivery => 'in:Home Delivery,Shipping,Pickup',
            $this->chosenAddress => 'exists:addresses,id',
        ]);
    }

    public function placeOrder()
    {
        $this->order->status = 'Pending';
        $this->order->save();

        $cartItems = auth()->user()->cart;

        foreach($cartItems as $item)
        {
            $sku = $item->sku;

            $this->createOrderItem($item);

            $sku->quantity -= $item->quantity;

            $this->updateOtherCarts($sku);

            $sku->save();
        }

        auth()->user()->cart()->delete();

        $this->redirect('/user/orders');
    }

    public function createOrderItem($item)
    {
        OrderItem::create([
            'order_id' => $this->order->id,
            'sku_id' => $item->sku->id,
            'quantity' => $item->quantity,
            'price' => $item->sku->price,
        ]);
    }

    public function updateOtherCarts($sku)
    {
        if($sku->quantity === 0)
        {
            $sku->status = 0;
            foreach($sku->cartedBy->pluck('id') as $id)
            {
                if($id !== auth()->id())
                {
                    $sku->cart()->where('user_id', $id)->first()->delete();
                }
            }
        } else {
            foreach($sku->cartedBy->pluck('id') as $id)
            {
                if($id !== auth()->id())
                {
                    if($sku->cart()->where('user_id', $id)->first()->quantity > $sku->quantity)
                    {
                        $sku->cart()->where('user_id', $id)->first()->update([
                            'quantity' => $sku->quantity
                        ]);
                    }
                }
            }
        }
    }

    public function ensureUserHasAddresses()
    {
        return auth()->user()->addresses()->count() === 0 ? redirect('/user/addresses') : '';
    }

    public function ensureUserHasItemsInCart()
    {
        return auth()->user()->cart()->count() === 0 ? redirect('/user/cart') : '';
    }

    public function render()
    {
        $this->saveOrderDetails();

        return view('livewire.user.checkout');
    }
}
