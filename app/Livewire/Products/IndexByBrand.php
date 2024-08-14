<?php

namespace App\Livewire\Products;

use App\Models\Sku;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Filterable;
use App\Livewire\Traits\Favoritable;

class IndexByBrand extends Component
{
    use Cartable, Favoritable, WithPagination, Filterable;

    public Brand $brand;

    public $skusIds;

    public function mount()
    {
        $brandId = $this->brand->id;
        $this->skusIds = Sku::whereHas('product', function ($query) use ($brandId) {
            $query->whereHas('brand', function ($query) use ($brandId) {
                $query->where('id', $brandId);
            });
        })->pluck('id');
    }

    public function render()
    {
        return view('livewire.products.index', [
            'skus' => $this->getSkus($this->skusIds),
            'title' => 'ShopSphere — ' . $this->brand->name,
        ]);
    }
}
