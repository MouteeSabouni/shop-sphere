<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Favoritable;

class Index extends Component
{
    use Cartable, Favoritable;

    public function render()
    {
        return view('livewire.products.index', [
            'products' => Product::all(),
            'title' => 'ShopeSphere — All'
        ]);
    }
}
