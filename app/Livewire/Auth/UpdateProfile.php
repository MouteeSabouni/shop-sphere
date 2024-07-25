<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Livewire\FOrms\ProfileForm;
use Livewire\Attributes\Title;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;

#[Title('ShopSphere — Profile')]
class UpdateProfile extends Component
{
    public ProfileForm $form;

    public $showUpdated = false;

    public function mount(User $user)
    {
        $this->form->setUser(auth()->user());
    }

    public function save()
    {
        $this->form->update();

        $this->showUpdated = true;

        $this->dispatch('profile-updated');
    }

    public function render()
    {
        return view('livewire.auth.update-profile');
    }
}
