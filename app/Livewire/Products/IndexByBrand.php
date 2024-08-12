<?php

namespace App\Livewire\Products;

use App\Models\Brand;
use Livewire\Component;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Favoritable;
use Livewire\WithPagination;

class IndexByBrand extends Component
{
    use Cartable, Favoritable, WithPagination;

    public Brand $brand;

    public function render()
    {
        return view('livewire.products.index', [
            'products' => $this->brand->products()->simplePaginate(12),
            'title' => 'ShopSphere — ' . $this->brand->name,
        ]);
    }
}
