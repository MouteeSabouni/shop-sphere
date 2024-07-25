<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Livewire\Forms\AuthenticationForm;

#[Title('ShopSphere — Login')]
class Login extends Component
{
    public AuthenticationForm $form;

    public function login()
    {
        $this->form->authenticate();
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
