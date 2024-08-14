<?php

namespace App\Livewire\Products;

use App\Models\Sku;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Livewire\Forms\Filter;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Favoritable;

class IndexByCategory extends Component
{
    use Cartable, Favoritable, WithPagination;

    public Category $category;

    public Filter $filter;

    public $skusIds;

    public function mount()
    {
        $categoryId = $this->category->id;
        $this->skusIds = Sku::whereHas('product', function ($query) use ($categoryId) {
            $query->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('id', $categoryId);
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
            'skus' => Sku::with([
                'favoritedBy', 'cartedBy', 'images', 'product.seller', 'product.brand', 'product.categories'
                ])->withSum('reviews', 'rating')
                ->withCount('reviews')
                ->whereIn('id', $this->skusIds)->tap(function ($query) {
                    $this->filter->apply($query);
                })->simplePaginate(12),
            'title' => 'ShopSphere — ' . $this->category->name,
        ]);
    }
}
