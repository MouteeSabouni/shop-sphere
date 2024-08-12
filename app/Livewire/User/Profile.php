<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\FOrms\ProfileForm;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;

#[Title('ShopSphere — Profile')]
class Profile extends Component
{
    public ProfileForm $form;

    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public $showUpdated = false;
    public $showChanged = false;

    public function mount(User $user)
    {
        $this->form->setUser(auth()->user());
    }

    public function changePassword()
    {
        $attributes = $this->validate([
            'current_password' => 'required_with:new_password|string|min:8|max:96',
            'new_password' => 'required_with:new_password_confirmation|string|min:8|max:96|confirmed',
        ]);

        if (!Hash::check($attributes['current_password'], auth()->user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The provided current password is not correct.']
            ]);
        }

        $attributes['new_password'] = Hash::make($attributes['new_password']);

        auth()->user()->update(['password' => $attributes['new_password']]);

        $this->showChanged = true;
    }

    public function updateProfile()
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
