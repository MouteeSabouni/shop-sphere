<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Testimony;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;

class Home extends Component
{
    #[Validate('required', message: 'Please leave us a nice review')]
    #[Validate('min:4', message: 'How about 4 characters at least?')]
    #[Validate('max:500', message: '500 characters is too long, isn\'t?')]
    public $comment = '';

    #[Validate('required', message: 'Please tell us your current job title')]
    #[Validate('min:3', message: 'How about 3 characters at least?')]
    #[Validate('max:255', message: '255 characters is too long, isn\'t?')]
    public $user_title;

    public $reviewSubmitted = false;

    public $testimonies;
    public $electronicsProducts;
    public $wearingProducts;
    public $topRatedSkus;

    public function addTestimony()
    {
        $validated = $this->validate();

        $validated['user_id'] = auth()->id();

        Testimony::create($validated);

        $this->reviewSubmitted = true;
    }

    public function render()
    {
        $this->testimonies = Testimony::latest()->with('user')->get();

        $this->electronicsProducts = Product::whereHas('categories', function ($query) {
            $query->where('slug', 'electronics');
        })->whereDoesntHave('skus', function ($query) {
            $query->where('status', 0);
        })
        ->limit(4)
        ->get();

        $this->wearingProducts = Product::whereHas('categories', function ($query) {
            $query->where('slug', 'wearing');
        })->whereDoesntHave('skus', function ($query) {
            $query->where('status', 0);
        })
        ->limit(4)
        ->get();

        $this->topRatedSkus = Sku::all()
        ->sortByDesc(function ($sku) {
            return $sku->rating();
        });

        return view('livewire.home', ['title' => 'ShopSphere — Home']);
    }
}
