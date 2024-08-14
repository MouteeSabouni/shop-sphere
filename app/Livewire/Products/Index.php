<?php

namespace App\Livewire\Products;

use App\Models\Sku;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Filterable;
use App\Livewire\Traits\Favoritable;

#[Lazy]
#[Title('ShopSphere — All')]
class Index extends Component
{
    use Cartable, Favoritable, WithPagination, Filterable;

    public $skusIds;

    public function mount()
    {
        $this->skusIds = Sku::all()->pluck('id');
    }

    public function render()
    {
        return view('livewire.products.index', [
            'skus' => $this->getSkus($this->skusIds)
        ]);
    }

    public function placeholder()
    {
        return view('components.products.index.placeholder');
    }
}
