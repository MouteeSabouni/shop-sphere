<?php

namespace App\Livewire\Products;

use App\Models\Sku;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;
use App\Livewire\Forms\Filter;
use Livewire\Attributes\Title;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Favoritable;

#[Lazy]
#[Title('ShopSphere — All')]
class Index extends Component
{
    use Cartable, Favoritable, WithPagination;

    public Filter $filter;

    public $skusIds;

    public function mount()
    {
        $this->skusIds = Sku::all()->pluck('id');
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
        ]);
    }

    public function placeholder()
    {
        return view('components.products.index.placeholder');
    }
}
