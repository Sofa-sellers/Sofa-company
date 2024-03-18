<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\RatingReviewController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ShippingFeeController;
use App\Http\Controllers\Admin\DeliveryOrderController;
use App\Http\Controllers\Admin\WarrantyController;

use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\ProductController as GuestProductController;
use App\Http\Controllers\Guest\CompareController;
use App\Http\Controllers\Guest\ContactController;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Client\RegisterController as ClientRegisterController;
use App\Http\Controllers\Client\LoginController as ClientLoginController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\WishlistController;
use App\Http\Controllers\Client\RatingReviewController as ClientRatingReviewController;
use App\Http\Controllers\Client\AccountController;






use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


    Route::get('/', [HomeController::Class, 'index'])->name('index');
    Route::get('/email-promotion', [HomeController::Class, 'emailPromotionPost'])->name('emailPromotionPost');
    Route::post('/email-promotion', [HomeController::Class, 'emailPromotion'])->name('emailPromotion');
    Route::get('/search', [HomeController::Class, 'searchPost'])->name('searchPost');
    Route::post('/search', [HomeController::Class, 'search'])->name('search');
    Route::get('/category/{id}', [GuestProductController::Class, 'category'])->name('category');
    Route::get('/detail/{id}', [GuestProductController::Class, 'detail'])->name('detail');
    Route::get('/compare', [CompareController::Class, 'compare'])->name('compare');
    Route::get('/contact', [ContactController::Class, 'contact'])->name('contact');
    Route::get('/about-us', [PagesController::Class, 'aboutUs'])->name('about-us');
    
Route::name('client.')->group(function () {

    Route::get('/register', [RegisterController::class, 'showRegister'])->name('showRegister');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::get('/login', [ClientLoginController::class, 'showLogin'])->name('showLogin');
    Route::post('/login', [ClientLoginController::class, 'login'])->name('login');
    Route::get('/logout', [ClientLoginController::class, 'logout'])->name('logout');
    Route::get('/forgotpassword', [ClientLoginController::class, 'forgotPassword'])->name('forgotPassword');

    Route::get('/add-to-cart/{id}/{quantity}', [CartController::Class, 'addToCart'])->name('addToCart');
    Route::get('/cart', [CartController::Class, 'cart'])->name('cart');
    Route::get('/cart-delete/{id}', [CartController::Class, 'cartDelete'])->name('cartDelete');
    Route::post('/cart-update/{id}/{quantity}', [CartController::Class, 'cartUpdate'])->name('cartUpdate');
    Route::get('/checkout', [CartController::Class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CartController::Class, 'checkoutPost'])->name('checkoutPost');

    
    Route::get('/wishlist', [WishlistController::Class, 'wishList'])->name('wishList');
    Route::get('/rating-review', [ClientRatingReviewController::Class, 'ratingReview'])->name('ratingReview');

    Route::prefix('/account')->name('account.')->controller(AccountController::class)->group(function () {
        Route::get('dashboard', [AccountController::Class, 'dashboard'])->name('dashboard');
        Route::get('orders', [AccountController::Class, 'orders'])->name('orders');
        Route::get('download', [AccountController::Class, 'download'])->name('download');
        Route::get('address', [AccountController::Class, 'address'])->name('address');
        Route::get('account-details', [AccountController::Class, 'accountDetails'])->name('accountDetails');
    });
});

Route::get('auth/login', [LoginController::class, 'showLogin'])->name('auth.showLogin');
Route::post('auth/login', [LoginController::class, 'login'])->name('auth.login');
Route::get('auth/logout', [LoginController::class, 'logout'])->name('auth.logout');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('attribute')->name('attribute.')->controller(AttributeController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('attribute-value')->name('attribute-value.')->controller(AttributeValueController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('user')->name('user.')->controller(UserController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('address')->name('address.')->controller(AddressController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('order')->name('order.')->controller(OrderController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::get('ratingReview', [RatingReviewController::Class, 'ratingReview'])->name('ratingReview');
    
    Route::prefix('shipping-fee')->name('shipping-fee.')->controller(ShippingFeeController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('delivery-order')->name('delivery-order.')->controller(DeliveryOrderController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('warranty')->name('warranty.')->controller(WarrantyController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });
});

