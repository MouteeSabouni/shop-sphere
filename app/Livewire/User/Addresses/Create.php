<?php

namespace App\Livewire\User\Addresses;

use App\Models\Address;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;


#[Title('ShopSphere — Addresses')]
class Create extends Component
{
    public $name;
    public $city;
    public $district;
    public $address_line;

    public $showCreated = false;

    public function create()
    {
        $validated = $this->validate([
            'name' => 'nullable|string',
            'city' => 'required|string',
            'district' => 'nullable|string',
            'address_line' => 'required|string'
        ]);

        auth()->user()->addresses()->create($validated);

        $this->showCreated = true;
        $this->reset(['name', 'city', 'district', 'address_line']);
    }

    #[On('address-updated')]
    public function refresh()
    {
        //
    }

    public function render()
    {
        return view('livewire.user.addresses.create');
    }
}
