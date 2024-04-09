<?php

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Auth\LoginController;


use App\Http\Controllers\Client\ClientController;

use App\Http\Controllers\Logout;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('login', [LoginController::class, 'showLogin'])
->name('showLogin');
Route::post('login',[LoginController::class, 'login']);

Route::get('register',[LoginController::class, 'showRegister'])
->name('showRegister');
Route::post('register',[LoginController::class, 'register'])->name('registerPost');

Route::get('forgetPassword',[LoginController::class,'showForgotPassword'])
->name('forget.password');
Route::post('forgetPassword',[LoginController::class,'forgotPassword'])
->name('forget.password.post');

route::get('resetPassword/{token}',[LoginController::class,'resetPassword'])
->name('reset.password');
route::post('resetPassword',[LoginController::class,'resetPasswordPost'])
->name('reset.password.post');

//route::get('search_data',[GuestController::class,'search_data']);

Route::get('Logout',Logout::class)->name('logout');

Route::prefix('')->controller(GuestController::class)->group(function () {

        Route::get('', 'index')->name('index');

        Route::get('shop', 'shop')->name('indexShop');
        Route::get('shop/cate/{cate_id}', 'viewShop')->name('shop');

        Route::post('search', 'search')->name('search');

        Route::get('category/{id}', 'category')->name('category');

        Route::get('detail/{slug}', 'detail')->name('detail');

        Route::get('download/{id}', 'download')->name('download');

        Route::get('contact', 'contact')->name('contact');

        Route::get('aboutUs', 'aboutUs')->name('aboutus');

        Route::get('privacy', 'privacy')->name('privacy');
        Route::get('404', '404')->name('404');
    });

    // Route::get('/about-us', [HomeController::Class, 'aboutUs'])->name('about-us');

Route::prefix('client')->name('client.')->middleware('checkLogin')->group(function () {

    //Account là bắt buộc phải đăng nhập mới vào được nên các function này cần đăng nhập thì ng dùng mới thực hiện đc ấy
    Route::controller(ClientController::class)->group(function () {


        Route::post('add-to-cart', 'addToCart')->name('addToCart');
        Route::get('cart', 'showCart')->name('showCart');

        Route::get('compare/{id}', 'showCompare')->name('showCompare');
        Route::post('compare', 'addToCompare')->name('addCompareList');
        Route::post('removeCompare', 'DeleteCompareProduct')->name('DeleteCompareProduct');

        Route::get('wishlist/{id}', 'showWishlist')->name('showWishlist');
        Route::post('add-to-wishlist', 'addToWishlist')->name('addToWishlist');
        Route::post('wishlist-delete', 'wishlistDelete')->name('wishlistDelete');

        Route::get('cart-delete/{itemKey}', 'cartDelete')->name('cartDelete');
        Route::post('cart-update/{itemKey}', 'cartUpdate')->name('cartUpdate');


        Route::get('checkout', 'showCheckout')->name('showCheckout');
        Route::post('checkout/{user}', 'checkout')->name('checkout');


        Route::post('rating-review', 'racomStore')->name('ratingCommentStore');
        Route::post('rating-review/{id}', 'racomUpdate')->name('ratingCommentUpdate');

        // Route::get('wishlist-update/{id}/{quantity}', 'wishlistUpdate')->name('wishlistUpdate');

        Route::get('account{id}', 'accountIndex')->name('account');

        // Route::post('order/{id}', 'orderManagement')->name('order');
        Route::get('orderdetail/{id}', 'showDetail')->name('showDetail');
        Route::post('orderdetail/{id}', 'updateDetail')->name('updateDetail');

        Route::post('address/{id}', 'addressUpdate')->name('address');
        Route::post('accountDetail/{id}','accountDetailsUpdate')->name('accountDetails');
        Route::get('logout','logout')->name('logout');
    });
});


Route::prefix('admin')->name('admin.')->controller(AdminController::class)->group(function () {
    Route::get('index', 'index')->name('index')->middleware(['auth','admin']);
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('index', 'cateIndex')->name('index')->middleware(['auth','admin']);

        Route::get('create', 'cateCreate')->name('create')->middleware(['auth','admin']);
        Route::post('store', 'cateStore')->name('store')->middleware(['auth','admin']);

        Route::get('edit/{id}', 'cateEdit')->name('edit')->middleware(['auth','admin']);
        Route::post('update/{id}', 'cateUpdate')->name('update')->middleware(['auth','admin']);

        Route::get('check-category/{id}', 'checkCategory')->name('check-category')->middleware(['auth','admin']);
        Route::get('destroy/{id}', 'cateDestroy')->name('destroy')->middleware(['auth','admin']);
    });

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('index', 'productIndex')->name('index')->middleware(['auth','admin']);

        Route::get('create', 'productCreate')->name('create')->middleware(['auth','admin']);
        Route::post('store', 'productStore')->name('store')->middleware(['auth','admin']);

        Route::get('edit/{id}', 'productEdit')->name('edit')->middleware(['auth','admin']);
        Route::post('update/{id}', 'productUpdate')->name('update')->middleware(['auth','admin']);

        Route::get('destroy/{id}', 'productDestroy')->name('destroy')->middleware(['auth','admin']);
        });

    // Route::prefix('attribute')->name('attribute.')->group(function () {
    //         Route::get('index', 'attributeIndex')->name('index')->middleware(['auth','admin']);

    //         Route::get('create', 'attributeCreate')->name('create')->middleware(['auth','admin']);
    //         Route::post('store', 'attributeStore')->name('store')->middleware(['auth','admin']);

    //         Route::get('edit/{id}', 'attributeEdit')->name('edit')->middleware(['auth','admin']);
    //         Route::post('update/{id}', 'attributeUpdate')->name('update')->middleware(['auth','admin']);

    //         Route::get('destroy/{id}', 'attributeDestroy')->name('destroy')->middleware(['auth','admin']);
    //     });

    Route::prefix('value')->name('value.')->group(function () {
            Route::get('index', 'valueIndex')->name('index')->middleware(['auth','admin']);

            Route::get('create', 'valueCreate')->name('create')->middleware(['auth','admin']);
            Route::post('store', 'valueStore')->name('store')->middleware(['auth','admin']);

            // Route::get('edit/{id}', 'valueEdit')->name('edit')->middleware(['auth','admin']);
            // Route::post('update/{id}', 'valueUpdate')->name('update')->middleware(['auth','admin']);

            Route::get('destroy/{id}', 'valueDestroy')->name('destroy')->middleware(['auth','admin']);
        });

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('index', 'userIndex')->name('index')->middleware(['auth','admin']);

            Route::get('create', 'userCreate')->name('create')->middleware(['auth','admin']);
            Route::post('store', 'userStore')->name('store')->middleware(['auth','admin']);

            Route::get('edit/{id}', 'userEdit')->name('edit')->middleware(['auth','admin']);
            Route::post('update/{id}', 'userUpdate')->name('update')->middleware(['auth','admin']);

            Route::get('destroy/{id}', 'userDestroy')->name('destroy')->middleware(['auth','admin']);
        });

        Route::prefix('ratingComment')->name('ratingComment.')->group(function() {
            Route::get('index', 'racomIndex')->name('index')->middleware(['auth','admin']);

            Route::post('accept/{id}', 'racomAccept')->name('update')->middleware(['auth','admin']);

            Route::get('destroy/{id}', 'racomDestroy')->name('destroy')->middleware(['auth','admin']);
        });

        Route::prefix('order')->name('order.')->group(function () {
            Route::get('index', 'orderIndex')->name('index')->middleware(['auth','admin']);

            // Route::get('create', 'orderCreate')->name('create')->middleware(['auth','admin']);
            // Route::post('store', 'orderStore')->name('store')->middleware(['auth','admin']);

            Route::get('edit/{id}', 'orderEdit')->name('edit')->middleware(['auth','admin']);
            Route::post('update/{id}', 'orderUpdate')->name('update')->middleware(['auth','admin']);

            // Route::get('destroy/{id}', 'orderDestroy')->name('destroy')->middleware(['auth','admin']);
        });

        Route::prefix('brand')->name('brand.')->group(function () {
            Route::get('index', 'brandIndex')->name('index')->middleware(['auth','admin']);

            Route::get('create', 'brandCreate')->name('create')->middleware(['auth','admin']);
            Route::post('store', 'brandStore')->name('store')->middleware(['auth','admin']);

            Route::get('edit/{id}', 'brandEdit')->name('edit')->middleware(['auth','admin']);
            Route::post('update/{id}', 'brandUpdate')->name('update')->middleware(['auth','admin']);

            Route::get('destroy/{id}', 'brandDestroy')->name('destroy')->middleware(['auth','admin']);
        });

        Route::prefix('sku')->name('sku.')->group(function () {
            Route::get('index/{id}', 'skuIndex')->name('index')->middleware(['auth','admin']);

            Route::get('create/{id}', 'skuCreate')->name('create')->middleware(['auth','admin']);
            Route::post('store', 'skuStore')->name('store')->middleware(['auth','admin']);

            Route::get('destroy/{id}', 'skuDestroy')->name('destroy')->middleware(['auth','admin']);
        });

        Route::prefix('zip')->name('zip.')->group(function () {
            Route::get('index', 'zipIndex')->name('index')->middleware(['auth','admin']);

            Route::get('create', 'zipCreate')->name('create')->middleware(['auth','admin']);
            Route::post('store', 'zipStore')->name('store')->middleware(['auth','admin']);

            Route::get('edit/{id}', 'zipEdit')->name('edit')->middleware(['auth','admin']);
            Route::post('update/{id}', 'zipUpdate')->name('update')->middleware(['auth','admin']);

            Route::get('destroy/{id}', 'zipDestroy')->name('destroy')->middleware(['auth','admin']);
        });
});


