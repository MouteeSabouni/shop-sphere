<?php

use App\Livewire\HomePage;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Products\Show;
use App\Livewire\Products\Index;
use App\Livewire\Products\Create;
use App\Livewire\Auth\UpdateProfile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureUserIsSeller;

Route::get('/', HomePage::class)->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});

Route::get('/products/{product:slug}/{sku:code}', Show::class)->name('products.show');
Route::get('/products', Index::class)->name('products.index');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', UpdateProfile::class)->name('profile');
    Route::get('/products/create', Create::class)->name('products.create')->middleware(EnsureUserIsSeller::class);
});

