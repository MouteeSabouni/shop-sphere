<?php

namespace App\Livewire\Nav;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public function getResults()
    {
        $q = request('q');

        $products = Product::where('name', 'like', '%' . $q . '%')
            ->orWhere('description', 'like', '%' . $q . '%')
            ->orWhereHas('categories', function($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%');
            })->simplePaginate(12);

        return $products;
    }

    public function render()
    {
        $products = $this->getResults();

        return view('livewire.products.index', [
            'products' => $products,
            'title' => 'ShopSPhere — Search'
        ]);
    }
}
