<?php

namespace App\Livewire\Nav;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    #[On('profile-updated')]
    public function updateUsername()
    {
        //
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.nav.index');
    }
}
