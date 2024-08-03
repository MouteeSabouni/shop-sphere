<?php

namespace App\Livewire\Products;

use App\Models\Sku;
use Livewire\Component;
use App\Models\Product;
use App\Livewire\Traits\Cartable;

class Show extends Component
{
use Cartable;

    public Product $product;
    public Sku $sku;

    public $images;
    public $mainImage;
    public $currentIndex = 0;
    public $visibleCount = 3;

    public function mount()
    {
        $this->mainImage = $this->sku->images->first()->url;
        $this->images  = $this->sku->images;
    }

    public function favorite()
    {
        auth()->user()->favoriteProducts()->attach($this->sku);
    }

    public function unfavorite()
    {
        auth()->user()->favoriteProducts()->detach($this->sku);
    }

    public function scrollLeft()
    {
        $this->currentIndex--;
    }

    public function scrollRight()
    {
        $this->currentIndex++;
    }

    public function setMainImage($imageUrl)
    {
        $this->mainImage = $imageUrl;
    }

    public function render()
    {
        return view('livewire.products.show');
    }
}
