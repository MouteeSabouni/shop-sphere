<?php

namespace App\Livewire\Traits;

use App\Models\Sku;
use App\Livewire\Forms\Filter;

trait Filterable
{
    public Filter $filter;

    public function getSkus($skusIds)
    {
        return Sku::with([
            'favoritedBy', 'cartedBy', 'images', 'product.seller', 'product.brand', 'product.categories'
            ])->withSum('reviews', 'rating')
            ->withCount('reviews')
            ->whereIn('id', $skusIds)->tap(function ($query) {
                $this->filter->apply($query);
            })->simplePaginate(12);
    }

    public function getLatestSkus($skusIds)
    {
        return Sku::with([
            'favoritedBy', 'cartedBy', 'images', 'product.seller', 'product.brand', 'product.categories'
            ])->withSum('reviews', 'rating')
            ->withCount('reviews')
            ->whereIn('id', $skusIds)->tap(function ($query) {
                $this->filter->apply($query);
            })->latest()->simplePaginate(12);
    }

    public function clearFilter()
    {
        $this->filter->clear();
    }
}
