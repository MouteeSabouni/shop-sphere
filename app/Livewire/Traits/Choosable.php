<?php

namespace App\Livewire\Traits;

use App\Models\Address;

trait Choosable
{
    public function chooseAddress($addressId)
    {
        $this->chosenAddress = Address::findOrFail($addressId)->id;
        $this->order->address_id = $this->chosenAddress;
        $this->order->save();
    }

    public function chooseDelivery($deliveryMethod)
    {
        $this->chosenDelivery = $deliveryMethod;
        $this->order->delivery_method = $this->chosenDelivery;
        $this->order->save();
    }

    public function choosePayment($paymentMethod)
    {
        $this->chosenPayment = $paymentMethod;
        $this->order->payment_method = $this->chosenPayment;
        $this->order->save();
    }
}
