<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\FOrms\ProfileForm;
use Illuminate\Auth\Access\AuthorizationException;

#[Title('ShopSphere — Profile')]
class Profile extends Component
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
        return view('livewire.user.profile');
    }
}
