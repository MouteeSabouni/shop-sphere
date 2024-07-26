<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use App\Livewire\Forms\ProfileForm;

#[Title('ShopSphere — Register')]
class Register extends Component
{
    public ProfileForm $form;

    #[Validate('accepted', message: 'You must agree to the terms of service first')]
    public $tos = false;

    public function save()
    {
        $this->validate();

        $this->form->create();

        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}

