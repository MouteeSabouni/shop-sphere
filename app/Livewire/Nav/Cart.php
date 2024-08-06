<?php

namespace App\Livewire\Nav;

use Livewire\Component;
use Livewire\Attributes\On;

class Cart extends Component
{
    #[On('added-to-cart')]
    #[On('removed-from-cart')]
    public function refreshCart()
    {
        //
    }

    public function render()
    {
        return view('livewire.nav.cart');
    }
}
