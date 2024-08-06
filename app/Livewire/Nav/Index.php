<?php

namespace App\Livewire\Nav;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Illuminate\Http\Request;
use App\Livewire\Traits\Scrollable;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use Scrollable;

    public $currentIndex = 0;
    public $visibleCount = 30;

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
        return view('livewire.nav.index', [
            'categories' => Category::all()
        ]);
    }
}
