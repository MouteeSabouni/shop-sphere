<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Livewire\Traits\Cartable;

class Index extends Component
{
    use Cartable;

    public function render()
    {
        return view('livewire.products.index', [
            'products' => Product::all()
        ]);
    }
}
