<?php

use App\Livewire\Home;
use App\Livewire\User\Cart;
use App\Livewire\Auth\Login;
use App\Livewire\Nav\Search;
use App\Livewire\User\Profile;
use App\Livewire\Products\Show;
use App\Livewire\Auth\Register;
use App\Livewire\User\Favorite;
use App\Livewire\Products\Index;
use App\Livewire\Products\Create;
use App\Livewire\Products\Newest;
use Illuminate\Support\Facades\Route;
use App\Livewire\Products\IndexByUser;
use App\Livewire\Products\IndexByBrand;
use App\Livewire\Products\IndexByCategory;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\EnsureUserIsSeller;

Route::get('/', Home::class)->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::get('/products', Index::class)->name('products.index');
Route::get('/products/newest', Newest::class)->name('products.newest');
Route::get('/products/search', Search::class)->name('products.search');
Route::get('/products/{product:slug}/{sku:code}', Show::class)->name('products.show');

Route::get('/brands/{brand:slug}', IndexByBrand::class)->name('products.index.brand');
Route::get('/users/{user:username}', IndexByUser::class)->name('products.index.user');
Route::get('/categories/{category:slug}', IndexByCategory::class)->name('products.index.category');

Route::middleware('auth')->group(function () {
    Route::get('/user/cart', Cart::class)->name('user.cart');
    // Route::get('/user/orders', Orders::class)->name('user.orders');
    Route::get('/user/profile', Profile::class)->name('user.profile');
    Route::get('/user/favorites', Favorite::class)->name('user.favorites');
    Route::get('/products/create', Create::class)->name('products.create')->middleware(EnsureUserIsSeller::class);
});

