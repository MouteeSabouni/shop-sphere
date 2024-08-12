<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Category;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Favoritable;
use Livewire\WithPagination;

class IndexByCategory extends Component
{
    use Cartable, Favoritable, WithPagination;

    public Category $category;

    public function render()
    {
        return view('livewire.products.index', [
            'products' => $this->category->products()->simplePaginate(12),
            'title' => 'ShopSphere — ' . $this->category->name,
        ]);
    }
}
