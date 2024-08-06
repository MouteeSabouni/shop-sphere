<?php

namespace App\Livewire\Traits;

trait Cartable
{
    public function addToCart($skuId, $itemsToAdd = 1)
    {
        $user = auth()->user();
        $cartItem = $user->cart()->where('sku_id', $skuId)->first();

        if ($cartItem) {
            $cartItem->quantity += $itemsToAdd;
            $cartItem->save();
        } else {
            $user->cart()->create([
                'sku_id' => $skuId,
                'quantity' => 1
            ]);
        }
        $this->dispatch('added-to-cart');
    }

    public function removeFromCart($skuId, $removeAll = false)
    {
        $user = auth()->user();
        $cartItem = $user->cart()->where('sku_id', $skuId)->first();

        if ($cartItem) {
            if ($removeAll === true || $cartItem->quantity === 1)
            {
                $user->cart()->where('sku_id', $skuId)->first()->delete();
            } else {
                $cartItem->quantity -= 1;
                $cartItem->save();
            }
        }

        $this->dispatch('removed-from-cart');
    }
}
