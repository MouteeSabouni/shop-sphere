<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Livewire\Traits\Cartable;

class Cart extends Component
{
    use Cartable;

    public function render()
    {
        return view('livewire.user.cart', [
            'cartItems' => auth()->user()->cart,
            'title' => 'ShopShpere — Cart'
        ]);
    }
}
