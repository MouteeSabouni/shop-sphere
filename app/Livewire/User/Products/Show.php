<?php

namespace App\Livewire\User\Products;

use App\Models\Product;
use Livewire\Component;

class Show extends Component
{
    public Product $product;

    public function render()
    {
        if($this->product->user_id !== auth()->id()) $this->redirect('/user/products');

        return view('livewire.user.products.show', [
            'product' => Product::whereId($this->product->id)->with('skus.images'),
            'title' => 'ShopSphere — ' . $this->product->name,
        ]);
    }
}
