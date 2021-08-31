<?php

use App\Http\Controllers\LanguageController;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminManageUserComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserOderDetailsComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserProfileComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeComponent::class);

Route::get('/shop', ShopComponent::class)->name('shop');

Route::get('/cart', CartComponent::class)->name('cart');

Route::get('/checkout', CheckoutComponent::class)->name('checkout');

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

Route::get('/search', SearchComponent::class)->name('product.search');

Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');

Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');

Route::get('/change-language/{language}', [LanguageController::class, 'changeLanguage'])->name('language');

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('dashboard', UserDashboardComponent::class)->name('dashboard');
    Route::get('user/profile', UserProfileComponent::class)->name('profile');
    Route::get('orders', UserOrdersComponent::class)->name('orders');
    Route::get('orders/{orderId}', UserOderDetailsComponent::class)->name('orderdetails');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('dashboard', AdminDashboardComponent::class)->name('dashboard');

    Route::get('products', AdminProductComponent::class)->name('products');
    Route::get('products/add', AdminAddProductComponent::class)->name('addproduct');
    Route::get('product/edit/{product_slug}', AdminEditProductComponent::class)->name('editproduct');

    Route::get('categories', AdminCategoryComponent::class)->name('categories');
    Route::get('category/add', AdminAddCategoryComponent::class)->name('addcategory');
    Route::get('category/edit/{categorySlug}', AdminEditCategoryComponent::class)->name('editcategory');

    Route::get('home-categories', AdminHomeCategoryComponent::class)->name('homecategories');
    
    Route::get('orders', AdminOrderComponent::class)->name('orders');
    Route::get('orders/{orderId}', AdminOrderDetailsComponent::class)->name('orderdetails');
    
    Route::get('users', AdminManageUserComponent::class)->name('users');
});
