<?php

namespace App\Livewire\Nav;

use App\Models\Sku;
use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\Traits\Filterable;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Favoritable;

class Search extends Component
{
    use Cartable, Favoritable, WithPagination, Filterable;

    public $skusIds;

    public function mount()
    {
        $q = request('q');

        $this->skusIds = Sku::whereHas('product', function ($query) use ($q) {
            $query->where('name', 'like', '%' . $q . '%')
            ->orWhere('description', 'like', '%' . $q . '%')
            ->orWhereHas('categories', function($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%');
            })
            ->orWhereHas('brand', function($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%');
            });
        })->pluck('id');
    }

    public function render()
    {
        return view('livewire.products.index', [
            'skus' => $this->getSkus($this->skusIds),
            'title' => 'ShopSPhere — Search'
        ]);
    }
}
