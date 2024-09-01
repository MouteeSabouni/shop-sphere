<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BecomeSellerController extends Controller
{
    public function show()
    {
        return auth()->user()->is_seller ? redirect('/products/create') : view('become-seller');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email:rfc,dns',
            'number' => 'required|regex:/^\+\d{1,3}\d{9}$/',
            'business_name'=> 'nullable|string|min:3|max:255',
            'social_links' => 'nullable|string|min:10|max:1024',
            'products' => 'required|string|min:3|max:1024'
        ]);

        auth()->user()->sellerRequest()->create($validated);

        return redirect('become-seller');
    }
}
