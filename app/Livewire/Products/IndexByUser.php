<?php

namespace App\Livewire\Products;

use App\Models\Sku;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Filterable;
use App\Livewire\Traits\Favoritable;

class IndexByUser extends Component
{
    use Cartable, Favoritable, WithPagination, Filterable;

    public User $user;

    public $skusIds;

    public function mount()
    {
        $userId = $this->user->id;
        $this->skusIds = Sku::whereHas('product', function ($query) use ($userId) {
            $query->whereHas('seller', function ($query) use ($userId) {
                $query->where('id', $userId);
            });
        })->pluck('id');
    }

    public function render()
    {
        return view('livewire.products.index', [
            'skus' => $this->getSkus($this->skusIds),
            'title' => 'ShopSphere — ' . $this->user->first_name,
        ]);
    }
}
