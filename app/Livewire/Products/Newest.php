<?php

namespace App\Livewire\Products;

use App\Models\Sku;
use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Filterable;
use App\Livewire\Traits\Favoritable;

class Newest extends Component
{
    use Cartable, Favoritable, WithPagination, Filterable;

    public $skusIds;

    public function mount()
    {
        $this->skusIds = Sku::latest()->pluck('id');
    }

    public function render()
    {
        return view('livewire.products.index', [
            'skus' => $this->getSkus($this->skusIds),
            'title' => 'ShopSphere — Newest'
        ]);
    }
}
