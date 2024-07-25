<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Livewire\Forms\ProfileForm;

#[Title('ShopSphere — Register')]
class Register extends Component
{
    public ProfileForm $form;
    public $tos = false;

    public function save()
    {
        if($this->tos !== true){
            return back()->with(['tos' => 'You must agree to the terms of service first']);
        }

        $this->form->create();

        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}

