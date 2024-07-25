<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use App\Models\User;
use Livewire\Form;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ProfileForm extends Form
{
    public User $user;

    public $first_name;
    public $last_name;

    #[Validate('required', message: 'You need a username to register')]
    #[Validate('unique:users', message: 'Sorry, someone has already registered with this username')]
    #[Validate('regex:/^[a-zA-Z]+(-[a-zA-Z]+)?$/', message: 'Only letters [A-Z][a-z] and a ( - ) betweem them are allowed')]
    public $username;

    #[Validate('required', message: 'You need an email to register')]
    #[Validate('unique:users', message: 'Sorry, this email has already been taken')]
    #[Validate('email:rfc,dns', message: 'Please enter a valid email address')]
    public $email;

    public $password;
    public $password_confirmation;

    public function rules()
    {
        return [
            'username' => 'required|unique:users|regex:/^[a-zA-Z]+(-[a-zA-Z]+)?$/',
            'email' => 'required|email:rfc,dns|unique:users',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'password' => 'required|min:8|max:96',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function setUser(User $user)
    {
        $this->user = auth()->user();

        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->username = $this->user->username;
        $this->email = $this->user->email;
        $this->password = $this->user->password;
    }

    public function create()
    {
        $this->validate();

        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        Auth::login($user);
    }

    public function update()
    {
        $this->validate([
            'username' => ['required', 'regex:/^[a-zA-Z]+(-[a-zA-Z]+)?$/', Rule::unique('users')->ignore($this->user)],
            'email' => ['required', 'email:rfc,dns', Rule::unique('users')->ignore($this->user)],
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ]);

        $this->user->first_name = $this->first_name;
        $this->user->last_name = $this->last_name;
        $this->user->username = $this->username;
        $this->user->email = $this->email;

        $this->user->save();
    }
}
