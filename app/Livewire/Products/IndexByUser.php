<?php

namespace App\Livewire\Products;

use App\Models\Sku;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\Forms\Filter;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Favoritable;

class IndexByUser extends Component
{
    use Cartable, Favoritable, WithPagination;

    public User $user;

    public Filter $filter;

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
        'title' => 'ShopSphere — ' . $this->user->first_name,
        ]);
    }
}
