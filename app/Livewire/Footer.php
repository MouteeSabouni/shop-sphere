<?php

namespace App\Livewire;

use App\Models\Sku;
use App\Models\Brand;
use Livewire\Component;
use App\Models\Category;

class Footer extends Component
{
    public $skus;
    public $categories;
    public $brands;

    public function mount()
    {
        $this->skus = Sku::latest()->with('product')->limit(3)->get();

        $this->categories = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->limit(5)
            ->get();

        $this->brands = Brand::withCount('products')
            ->orderBy('products_count', 'desc')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.footer');
    }
}
