<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Category;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Favoritable;

class IndexByCategory extends Component
{
    use Cartable, Favoritable;

    public Category $category;

    public function render()
    {
        return view('livewire.products.index', [
            'products' => $this->category->products,
            'title' => 'ShopSphere — ' . $this->category->name,
        ]);
    }
}
