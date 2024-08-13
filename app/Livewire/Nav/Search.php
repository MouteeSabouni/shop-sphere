<?php

namespace App\Livewire\Nav;

use App\Models\Sku;
use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\Forms\Filter;

class Search extends Component
{
    use WithPagination;

    public Filter $filter;

    public $skusIds;

    public function clearFilter()
    {
        $this->filter->clear();
    }

    public function mount()
    {
        $q = request('q');

        $this->skusIds = Sku::whereHas('product', function ($query) use ($q) {
            $query->where('name', 'like', '%' . $q . '%')
            ->orWhere('description', 'like', '%' . $q . '%')
            ->orWhereHas('categories', function($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%');
            });
        })->pluck('id');
    }

    public function render()
    {
        return view('livewire.products.index', [
            'skus' => Sku::whereIn('id', $this->skusIds)->tap(function ($query) {
                $this->filter->apply($query);
            })->simplePaginate(12),
            'title' => 'ShopSPhere — Search'
        ]);
    }
}
