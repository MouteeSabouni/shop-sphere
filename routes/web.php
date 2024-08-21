<?php

use App\Livewire\Home;
use App\Livewire\User\Cart;
use App\Livewire\Auth\Login;
use App\Livewire\Nav\Search;
use App\Livewire\User\Profile;
use App\Livewire\User\Checkout;
use App\Livewire\Auth\Register;
use App\Livewire\User\Favorite;
use App\Livewire\Products\Newest;
use Illuminate\Support\Facades\Route;
use App\Livewire\Products\IndexByUser;
use App\Livewire\User\Products\AddSku;
use App\Livewire\User\Addresses\Update;
use App\Livewire\Products\IndexByBrand;
use App\Livewire\Products\IndexByCategory;
use App\Livewire\Products\Show as ProductsShow;
use App\Livewire\User\Orders\Show as OrdersShow;
use App\Http\Controllers\BecomeSellerController;
use App\Livewire\Products\Index as ProductsIndex;
use App\Livewire\User\Orders\Index as OrdersIndex;
use App\Livewire\Products\Create as CreateProduct;
use App\Livewire\User\Addresses\Create as CreateAddress;
use App\Livewire\User\Products\Show as UserProductsShow;
use App\Livewire\User\Products\Index as UserProductsIndex;

Route::get('/', Home::class)->name('home');

Route::get('/products', ProductsIndex::class)->name('products.index');
Route::get('/products/newest', Newest::class)->name('products.newest');
Route::get('/products/search', Search::class)->name('products.search');
Route::get('/products/{product:slug}/{sku:code}', ProductsShow::class)->name('products.show');

Route::get('/brands/{brand:slug}', IndexByBrand::class)->name('products.index.brand');
Route::get('/users/{user:username}', IndexByUser::class)->name('products.index.user');
Route::get('/categories/{category:slug}', IndexByCategory::class)->name('products.index.category');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/user/cart', Cart::class)->name('user.cart');
    Route::get('/user/profile', Profile::class)->name('user.profile');
    Route::get('/user/checkout', Checkout::class)->name('user.checkout');
    Route::get('/user/favorite', Favorite::class)->name('user.favorite');

    Route::get('/become-seller', [BecomeSellerController::class, 'show'])->name('become-seller.show');
    Route::post('/become-seller', [BecomeSellerController::class, 'store'])->name('become-seller.store');

    Route::get('/user/orders', OrdersIndex::class)->name('user.orders.index');
    Route::get('/user/orders/{order:id}', OrdersShow::class)->name('user.orders.show');

    Route::get('/user/addresses', CreateAddress::class)->name('user.addresses');
    Route::get('/user/addresses/{address:id}', Update::class)->name('user.addresses.update');

    Route::get('/user/products', UserProductsIndex::class)->name('user.products.index')->middleware('seller');
    Route::get('/user/products/{product:slug}', UserProductsShow::class)->name('user.products.show')->middleware('seller');
    Route::get('/user/products/add-sub-products/{product:slug}', AddSku::class)->name('user.products.add-skus')->middleware('seller');

    Route::get('/products/create', CreateProduct::class)->name('products.create')->middleware('seller');
});

