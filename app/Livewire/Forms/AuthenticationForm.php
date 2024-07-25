<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthenticationForm extends Form
{
    #[Validate('required', message: 'You need an email to register')]
    #[Validate('email:rfc,dns', message: 'Please enter a valid email address')]
    #[Validate('exists:users', message: 'This email does not match our records')]
    public $email;

    public $password;

    public function rules()
    {
        return [
            'email' => 'required|email:rfc,dns|exists:users',
            'password' => 'required|min:8|max:96',
        ];
    }

    public function authenticate()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials)) {

            request()->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with(['wrong-credentials' => 'Credentials do not match our records']);
    }
}
