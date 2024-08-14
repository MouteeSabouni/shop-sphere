<?php

namespace App\Livewire\Products;

use App\Models\Sku;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Filterable;
use App\Livewire\Traits\Favoritable;

class IndexByCategory extends Component
{
    use Cartable, Favoritable, WithPagination, Filterable;

    public Category $category;

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

    public function render()
    {
        return view('livewire.products.index', [
            'skus' => $this->getSkus($this->skusIds),
            'title' => 'ShopSphere — ' . $this->category->name,
        ]);
    }
}
