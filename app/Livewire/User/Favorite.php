<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Favoritable;

class Favorite extends Component
{
    use Cartable, Favoritable;

    public function render()
    {
        return view('livewire.user.favorite', [
            'skus' => auth()->user()->favoriteProducts()
                ->with(['images', 'product', 'cartedBy'])
                ->withSum('reviews', 'rating')
                ->withCount('reviews')
                ->get(),
            'title' => 'ShopSphere — Favorite'
        ]);
    }
}
