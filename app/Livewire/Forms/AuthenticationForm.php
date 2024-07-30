<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AuthenticationForm extends Form
{
    #[Validate('required', message: 'You can\'t login without an email')]
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

    public function login()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials, true)) {

            request()->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with(['login-failed' => 'Credentials do not match our records']);
    }
}
