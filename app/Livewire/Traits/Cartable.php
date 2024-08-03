<?php

namespace App\Livewire\Traits;

trait Cartable
{
    public function addToCart($skuId)
    {
        $user = auth()->user();
        $cartItem = $user->cart()->where('sku_id', $skuId)->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save(['updated_at' => false]);
        } else {
            $user->cart()->create([
                'sku_id' => $skuId,
                'quantity' => 1
            ]);
        }
        $this->dispatch('added-to-cart');
    }

    public function removeFromCart($skuId)
    {
        $user = auth()->user();
        $cartItem = $user->cart()->where('sku_id', $skuId)->first();

        if ($cartItem) {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->save();
            } else {
                $user->cart()->where('sku_id', $skuId)->first()->delete();
            }
        }

        $this->dispatch('removed-from-cart');
    }
}
