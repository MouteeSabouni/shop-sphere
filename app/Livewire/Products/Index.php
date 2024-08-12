<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Favoritable;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;

#[Lazy]
class Index extends Component
{
    use Cartable, Favoritable, WithPagination;

    public function render()
    {
        return view('livewire.products.index', [
            'products' => Product::simplePaginate(12),
            'title' => 'ShopeSphere — All'
        ]);
    }

    public function placeholder()
    {
        return view('livewire.products.placeholder');
    }
}
