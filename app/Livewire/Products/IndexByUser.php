<?php

namespace App\Livewire\Products;

use App\Models\User;
use Livewire\Component;
use App\Livewire\Traits\Cartable;
use App\Livewire\Traits\Favoritable;

class IndexByUser extends Component
{
    use Cartable, Favoritable;

    public User $user;

    public function render()
    {
        return view('livewire.products.index', [
            'products' => $this->user->products,
            'title' => 'ShopSphere — ' . $this->user->first_name,
        ]);
    }
}
