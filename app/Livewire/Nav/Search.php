<?php

namespace App\Livewire\Nav;

use Livewire\Component;
use App\Models\Product;

class Search extends Component
{
    public function getResults()
    {
        $q = request('q');

        $products = Product::where('name', 'like', '%' . $q . '%')
            ->orWhere('description', 'like', '%' . $q . '%')
            ->orWhereHas('categories', function($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%');
            })->get();
            // ->paginate(5);

        if($products->count() === 0)
        {
            abort(404);
        }

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
