<?php

namespace App\Livewire\Products;

use App\Models\Sku;
use Livewire\Component;
use App\Models\Product;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Scrollable;
use App\Livewire\Traits\Favoritable;
use Livewire\Attributes\Validate;

class Show extends Component
{
use Cartable, Scrollable, Favoritable;

    public Product $product;
    public Sku $sku;

    public $reviewSubmitted = false;

    #[Validate('required', message: 'Please rate the product')]
    #[Validate('integer', message: 'Only numbers are allowed')]
    public $rating;

    #[Validate('required', message: 'Please add a brief')]
    #[Validate('string', message: 'Your review is invalid')]
    #[Validate('min:4', message: 'Your review is too short')]
    #[Validate('max:500', message: 'Your review is too long')]
    public $comment = '';

    public $images;
    public $mainImage;
    public $currentIndex = 0;
    public $visibleCount = 3;

    public function mount()
    {
        $this->mainImage = $this->sku->images->first()->url;
        $this->images  = $this->sku->images;
        $this->sku = Sku::whereId($this->sku->id)->withSum('reviews', 'rating')->withCount('reviews')->first();
    }

    public function rateProduct($rating)
    {
        $this->rating = $rating;
    }

    public function addProductReview()
    {
        $this->validate();

        auth()->user()->reviews()->create([
            'rating' => $this->rating,
            'comment' => $this->comment,
            'sku_id' => $this->sku->id,
        ]);


        $this->reviewSubmitted = true;
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
