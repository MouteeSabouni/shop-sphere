<?php

namespace App\Livewire\Products;

use App\Models\Sku;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\Forms\Filter;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Favoritable;

class IndexByBrand extends Component
{
    use Cartable, Favoritable, WithPagination;

    public Brand $brand;

    public Filter $filter;

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

    public function clearFilter()
    {
        $this->filter->clear();
    }

    public function render()
    {
        return view('livewire.products.index', [
            'skus' => Sku::whereIn('id', $this->skusIds)->tap(function ($query) {
                $this->filter->apply($query);
            })->simplePaginate(12),
            'title' => 'ShopSphere — ' . $this->brand->name,
        ]);
    }
}
