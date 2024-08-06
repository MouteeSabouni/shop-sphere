<?php

namespace App\Livewire\Traits;

trait Favoritable
{
    public function favorite($skuId)
    {
        auth()->user()->favoriteProducts()->attach($skuId);
    }

    public function unfavorite($skuId)
    {
        auth()->user()->favoriteProducts()->detach($skuId);
    }
}
