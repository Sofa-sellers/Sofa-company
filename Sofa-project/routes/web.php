<?php

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Auth\LoginController;


use App\Http\Controllers\Client\ClientController;

use App\Http\Controllers\Logout;
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

//ở trang guest và client có vài mục sẽ có post ko có get vì get chỉ để hiện lên trang đó thôi (vd như hiện trang create user), nhưng ở đây, vd trang home đã có luôn hiển thị email-promotion r nên chỉ ko càn get, chỉ cần post nhé mn
//có 1 vài mục get và post của nó sẽ ở 2 Controller khác nhau (tùy vào có bắt buộc đăng nhập ko), vd như checkout của cart sẽ qua AccountController vì cần đăng nhập mới thực hiện đc
Route::prefix('')->group(function () {

    Route::controller(GuestController::class)->group(function () {
        Route::get('', 'index')->name('index');
        
        Route::post('email-promotion', 'emailPromotion')->name('emailPromotion'); 
        
        Route::post('search', 'search')->name('search');

        Route::get('category/{id}', 'category')->name('category');

        Route::get('detail/{id}', 'detail')->name('detail');

        Route::post('download/{id}', 'download')->name('download');

        Route::get('compare', 'showCompare')->name('showCompare');
        Route::post('compare', 'compare')->name('compare');

        Route::get('contact', 'contact')->name('contact');

        Route::get('shop', 'viewShop')->name('contact');
    });

    Route::controller(ClientController::class)->group(function () {
        Route::post('cart/{id}/{quantity}', 'addToCart');
        Route::get('cart', 'showCart')->name('showCart');
        Route::get('cart-delete/{id}', 'cartDelete')->name('cartDelete');
        Route::post('cart-update/{id}/{quantity}', 'cartUpdate');
        Route::get('checkout', 'showCheckout')->name('showCheckout');
        Route::post('checkout', 'checkout')->name('checkout');
    });
});

Route::get('login', [GuestController::class, 'showLogin'])->name('showLogin');
Route::post('login',[GuestController::class, 'login']);
Route::post('login',[GuestController::class, 'adminLogin']);

Route::get('register',[GuestController::class, 'showRegister'])->name('showRegister');
Route::post('register',[GuestController::class, 'register']);
        
// Route::get('forgotpassword','showForgotPassword')->name('showForgotPassword');
// Route::post('forgotPassword','forgotPassword');

Route::get('Logout',Logout::class)->name('logout');

    // Route::get('/about-us', [HomeController::Class, 'aboutUs'])->name('about-us');
    
Route::prefix('client')->name('client.')->middleware('checkLogin')->group(function () {
    
    //Account là bắt buộc phải đăng nhập mới vào được nên các function này cần đăng nhập thì ng dùng mới thực hiện đc ấy
    Route::controller(ClientController::class)->group(function () {

        Route::post('rating-review', 'ratingCommentStore')->name('ratingCommentStore');

        Route::post('rating-review/{id}', 'ratingCommentUpdate')->name('ratingCommentUpdate');

        //phần checkout của cart c đưa vào AccountController nhé Trân, vì login mới checkout đc nên c tách riêng phần này qua Account luôn
        
        
        Route::prefix('account')->name('account.')->group(function () {

            Route::get('index', 'accountIndex')->name('index');

            Route::get('add-to-wishlist/{id}/{quantity}', 'addToWishlist')->name('addToWishlist');
            Route::get('wishlist', 'showWishlist')->name('showWishlist');
            Route::get('wishlist-delete/{id}', 'wishlistDelete')->name('wishlistDelete');
            Route::post('wishlist-update/{id}/{quantity}', 'wishlistUpdate')->name('wishlistUpdate');

            Route::post('order', 'order')->name('order');
            Route::post('address/{id}', 'addressUpdate')->name('address');
            Route::post('account-details/{id}','accountDetailsUpdate')->name('accountDetails');
    });
});
});


Route::prefix('admin')->name('admin.')->controller(AdminController::class)->group(function () {

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('index', 'cateIndex')->name('index');

        Route::get('create', 'cateCreate')->name('create');
        Route::post('store', 'cateStore')->name('store');

        Route::get('edit/{id}', 'cateEdit')->name('edit');
        Route::post('update/{id}', 'cateUpdate')->name('update');

        Route::get('destroy/{id}', 'cateDestroy')->name('destroy');
    });

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('index', 'productIndex')->name('index');

        Route::get('create', 'productCreate')->name('create');
        Route::post('store', 'productStore')->name('store');

        Route::get('edit/{id}', 'productEdit')->name('edit');
        Route::post('update/{id}', 'productUpdate')->name('update');

        Route::get('destroy/{id}', 'productDestroy')->name('destroy');
        });

    Route::prefix('attribute')->name('attribute.')->group(function () {
            Route::get('index', 'attributeIndex')->name('index');

            Route::get('create', 'attributeCreate')->name('create');
            Route::post('store', 'attributeStore')->name('store');

            Route::get('edit/{id}', 'attributeEdit')->name('edit');
            Route::post('update/{id}', 'attributeUpdate')->name('update');

            Route::get('destroy/{id}', 'attributeDestroy')->name('destroy');
        });

    Route::prefix('value')->name('value.')->group(function () {
            Route::get('index', 'valueIndex')->name('index');

            Route::get('create', 'valueCreate')->name('create');
            Route::post('store', 'valueStore')->name('store');

            Route::get('edit/{id}', 'valueEdit')->name('edit');
            Route::post('update/{id}', 'valueUpdate')->name('update');

            Route::get('destroy/{id}', 'valueDestroy')->name('destroy');
        });

    Route::prefix('promotion')->name('promotion.')->group(function () {
            Route::get('index', 'promotionIndex')->name('index');
    
            Route::get('create', 'promotionCreate')->name('create');
            Route::post('store', 'promotionStore')->name('store');
    
            Route::get('edit/{id}', 'promotionEdit')->name('edit');
            Route::post('update/{id}', 'promotionUpdate')->name('update');
    
            Route::get('destroy/{id}', 'promotionDestroy')->name('destroy');
        });

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('index', 'userIndex')->name('index');

            Route::get('create', 'userCreate')->name('create');
            Route::post('store', 'userStore')->name('store');

            Route::get('edit/{id}', 'userEdit')->name('edit');
            Route::post('update/{id}', 'userUpdate')->name('update');

            Route::get('destroy/{id}', 'userDestroy')->name('destroy');
        });

        Route::prefix('ratingComment')->name('ratingComment.')->group(function() {
            Route::get('index', 'racomIndex')->name('index');

            Route::post('accept/{id}', 'racomAccept')->name('update');

            Route::get('edit/{id}', 'ratingCommentEdit')->name('edit');
            Route::post('update/{id}', 'ratingCommentUpdate')->name('update');

            Route::get('destroy/{id}', 'racomDestroy')->name('destroy');
        });

        Route::prefix('order')->name('order.')->group(function () {
            Route::get('index', 'orderIndex')->name('index');

            Route::get('create', 'orderCreate')->name('create');
            Route::post('store', 'orderStore')->name('store');

            Route::get('edit/{id}', 'orderEdit')->name('edit');
            Route::post('update/{id}', 'orderUpdate')->name('update');

            Route::get('destroy/{id}', 'orderDestroy')->name('destroy');
        });
    });


