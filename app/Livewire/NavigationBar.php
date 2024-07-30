<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavigationBar extends Component
{
    public function render()
    {
        return view('livewire.navigation-bar');
    }

    #[On('profile-updated')]
    public function updateUsername()
    {

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
