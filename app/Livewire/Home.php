<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Testimony;
use App\Models\Product;
use App\Models\Message;
use App\Models\Sku;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;

class Home extends Component
{
    #[Validate('required', message: 'Please tell us your current job title')]
    #[Validate('min:3', message: 'How about 3 characters at least?')]
    #[Validate('max:255', message: '255 characters is too long, isn\'t?')]
    public $user_title;

    #[Validate('required', message: 'Please leave us a nice review')]
    #[Validate('min:4', message: 'How about 4 characters at least?')]
    #[Validate('max:500', message: '500 characters is too long, isn\'t?')]
    public $comment = '';

    public $reviewSubmitted = false;

    #[Validate('required', message: 'Please tell us your name')]
    #[Validate('min:3', message: 'How about 3 characters at least?')]
    #[Validate('max:255', message: '255 characters is too long, isn\'t?')]
    public $user_name;

    #[Validate('required', message: 'Please enter your email address')]
    #[Validate('min:3', message: 'How about 3 characters at least?')]
    #[Validate('max:255', message: '255 characters is too long, isn\'t?')]
    public $email;

    #[Validate('required', message: 'Please fill out the field with your message')]
    #[Validate('min:10', message: 'How about 3 characters at least?')]
    #[Validate('max:255', message: '500 characters is too long, isn\'t?')]
    public $message;

    public $messageSent = false;

    public $testimonies;
    public $electronicsSkus;
    public $wearingSkus;
    public $topRatedSkus;

    public function addTestimony()
    {
        $validated = $this->validate([
            'user_title' => 'required|min:3|max:255',
            'comment' => 'required|min:4|max:500',
        ]);

        $validated['user_id'] = auth()->id();

        Testimony::create($validated);

        $this->reviewSubmitted = true;
    }

    public function sendMessage()
    {
        $validated = $this->validate([
            'user_name' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255',
            'message' => 'required|min:10|max:500',
        ]);

        Message::create($validated);

        $this->messageSent = true;
        $this->reset(['user_name', 'email', 'message']);
    }

    public function render()
    {
        $this->testimonies = Testimony::latest()->with('user')->get();

        $this->electronicsSkus = Sku::with('images')
        ->where('status', 1)
        ->withWhereHas('product', function ($query) {
            $query->whereHas('categories', function($query) {
                $query->where('slug', 'electronics');
            });
        })
        ->limit(4)
        ->get();

        $this->wearingSkus = Sku::with('images')
        ->where('status', 1)
        ->withWhereHas('product', function ($query) {
            $query->whereHas('categories', function($query) {
                $query->where('slug', 'wearing');
            });
        })
        ->limit(4)
        ->get();

        $this->topRatedSkus = Sku::with(['reviews', 'product', 'images'])
        ->withSum('reviews', 'rating')
        ->withCount('reviews')
        ->get()
        ->sortByDesc(function ($sku) {
            return $sku->reviews_count > 0 ? $sku->reviews_sum_rating/$sku->reviews_count : 0 ;
        });

        return view('livewire.home', ['title' => 'ShopSphere — Home']);
    }
}
