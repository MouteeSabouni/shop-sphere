<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Favoritable;
use Livewire\WithPagination;

class Index extends Component
{
    use Cartable, Favoritable, WithPagination;

    public function render()
    {
        return view('livewire.products.index', [
            'products' => Product::paginate(2),
            'title' => 'ShopeSphere — All'
        ]);
    }
}
