<?php

namespace App\Livewire\Products;

use App\Models\Sku;
use Livewire\Component;
use App\Livewire\Forms\Filter;

class Newest extends Component
{
    public Filter $filter;

    public $skusIds;

    public function mount()
    {
        $this->skusIds = Sku::latest()->pluck('id');
    }

    public function clearFilter()
    {
        $this->filter->clear();
    }

    public function render()
    {
        return view('livewire.products.index', [
            'skus' => Sku::with([
                'favoritedBy', 'cartedBy', 'images', 'product.seller', 'product.brand', 'product.categories'
                ])->withSum('reviews', 'rating')
                ->withCount('reviews')
                ->whereIn('id', $this->skusIds)->tap(function ($query) {
                    $this->filter->apply($query);
                })->simplePaginate(12),
            'title' => 'ShopSphere — Newest'
        ]);
    }
}
