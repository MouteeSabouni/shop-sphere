<?php

namespace App\Livewire\User\Products;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.user.products.index', [
            'products' => auth()->user()->products()->with('skus')->get(),
            'title' => 'ShopSphere — My Products'
        ]);
    }
}
