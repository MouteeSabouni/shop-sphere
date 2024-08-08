<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;

class Newest extends Component
{
    public function render()
    {
        return view('livewire.products.index', [
            'products' => Product::latest()->paginate(12),
            'title' => 'ShopSphere — Newest Products'
        ]);
    }
}
