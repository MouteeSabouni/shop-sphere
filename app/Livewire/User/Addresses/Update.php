<?php

namespace App\Livewire\User\Addresses;

use Livewire\Component;
use App\Models\Address;

class Update extends Component
{
    public Address $address;

    public $name;
    public $city;
    public $district;
    public $address_line;

    public $showUpdated = false;

    public function mount()
    {
        $this->name = $this->address->name;
        $this->city = $this->address->city;
        $this->district = $this->address->district;
        $this->address_line = $this->address->address_line;
    }

    public function update()
    {
        $validated = $this->validate([
            'name' => 'nullable|string',
            'city' => 'required|string',
            'district' => 'nullable|string',
            'address_line' => 'required|string'
        ]);

        $this->address->update([
            'name' => $this->name,
            'city' => $this->city,
            'district' => $this->district,
            'address_line' => $this->address_line,
        ]);

        $this->showUpdated = true;
    }

    public function delete()
    {
        $this->address->delete();

        return redirect()->route('user.addresses');
    }

    public function render()
    {
        return view('livewire.user.addresses.update');
    }
}
