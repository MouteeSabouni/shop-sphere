<?php

namespace App\Livewire\Nav;

use Livewire\Component;
use App\Models\Category;
use App\Livewire\Traits\Scrollable;


class Categories extends Component
{
    use Scrollable;

    public $currentIndex = 0;
    public $visibleCount = 24;

    public function render()
    {
        return view('livewire.nav.categories', [
            'categories' => Category::withCount('products')
                ->orderBy('products_count', 'desc')
                ->get()
        ]);
    }
}
