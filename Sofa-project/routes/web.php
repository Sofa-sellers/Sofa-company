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

//ở trang guest và client có vài mục sẽ có post ko có get vì get chỉ để hiện lên trang đó thôi (vd như hiện trang create user), nhưng ở đây, vd trang home đã có luôn hiển thị email-promotion r nên chỉ ko càn get, chỉ cần post nhé mn
//có 1 vài mục get và post của nó sẽ ở 2 Controller khác nhau (tùy vào có bắt buộc đăng nhập ko), vd như checkout của cart sẽ qua AccountController vì cần đăng nhập mới thực hiện đc

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


Route::get('Logout',Logout::class)->name('logout');

Route::prefix('')->controller(GuestController::class)->group(function () {

        Route::get('', 'index')->name('index');

        Route::get('product-grids','productGrids')->name('product-grids');
        Route::get('product-lists','productLists')->name('product-lists');
        Route::match(['get','post'],'/filter','productFilter')->name('shop.filter');
        Route::post('/product/search','productSearch')->name('product.search');

        Route::get('/product-cat/{slug}','productCat')->name('product-cat');
        Route::get('/product-sub-cat/{slug}/{sub_slug}','productSubCat')->name('product-sub-cat');
        Route::get('/product-brand/{slug}','productBrand')->name('product-brand');
        
        Route::post('email-promotion', 'emailPromotion')->name('emailPromotion'); 
        
        Route::post('search', 'search')->name('search');

        Route::get('category/{id}', 'category')->name('category');

        Route::get('detail/{id}', 'detail')->name('detail');

        Route::get('download/{id}', 'download')->name('download');

        Route::get('contact', 'contact')->name('contact');

        Route::get('aboutUs', 'aboutUs')->name('aboutus');

        Route::get('privacy', 'privacy')->name('privacy');
        
    });

    // Route::get('/about-us', [HomeController::Class, 'aboutUs'])->name('about-us');
    
Route::prefix('client')->name('client.')->middleware('checkLogin')->group(function () {
    
    //Account là bắt buộc phải đăng nhập mới vào được nên các function này cần đăng nhập thì ng dùng mới thực hiện đc ấy
    Route::controller(ClientController::class)->group(function () {

        Route::post('compare/store', 'compare')->name('compare');
        Route::get('compare/remove', 'removeCompare')->name('removeCompare');
        Route::get('compare', 'showCompare')->name('showCompare');

        Route::get('cart/{id}/{quantity}', 'addToCart')->name('addToCart');
        Route::get('cart', 'showCart')->name('showCart');
        Route::get('cart-delete/{id}', 'cartDelete')->name('cartDelete');
        
        Route::post('cart-update', 'cartUpdate')->name('cartUpdate');
        Route::get('checkout', 'showCheckout')->name('showCheckout');
        Route::post('checkout', 'checkout')->name('checkout');

        Route::post('rating-review', 'racomStore')->name('ratingCommentStore');
        Route::post('rating-review/{id}', 'racomUpdate')->name('ratingCommentUpdate');

        Route::post('wishlist/add', 'addToWishlist')->name('addToWishlist');
        Route::get('wishlist', 'showWishlist')->name('showWishlist');
        Route::get('wishlist-delete/{id}', 'wishlistDelete')->name('wishlistDelete');

        Route::post('wishlist-update/{id}/{quantity}', 'wishlistUpdate')->name('wishlistUpdate');
        Route::get('account', 'accountIndex')->name('account');
        Route::post('order', 'order')->name('order');
        Route::post('address/{id}', 'addressUpdate')->name('address');
        Route::post('account-details/{id}','accountDetailsUpdate')->name('accountDetails');
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

    Route::prefix('promotion')->name('promotion.')->group(function () {
            Route::get('index', 'promotionIndex')->name('index')->middleware(['auth','admin']);
    
            Route::get('create', 'promotionCreate')->name('create')->middleware(['auth','admin']);
            Route::post('store', 'promotionStore')->name('store')->middleware(['auth','admin']);
    
            Route::get('edit/{id}', 'promotionEdit')->name('edit')->middleware(['auth','admin']);
            Route::post('update/{id}', 'promotionUpdate')->name('update')->middleware(['auth','admin']);
    
            Route::get('destroy/{id}', 'promotionDestroy')->name('destroy')->middleware(['auth','admin']);
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

            Route::get('create', 'orderCreate')->name('create')->middleware(['auth','admin']);
            Route::post('store', 'orderStore')->name('store')->middleware(['auth','admin']);

            Route::get('edit/{id}', 'orderEdit')->name('edit')->middleware(['auth','admin']);
            Route::post('update/{id}', 'orderUpdate')->name('update')->middleware(['auth','admin']);

            Route::get('destroy/{id}', 'orderDestroy')->name('destroy')->middleware(['auth','admin']);
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
            Route::get('index/{product_id}', 'skuIndex')->name('index')->middleware(['auth','admin']);

            Route::get('create/{product_id}', 'skuCreate')->name('create')->middleware(['auth','admin']);
            Route::post('store/{id}', 'skuStore')->name('store')->middleware(['auth','admin']);

            Route::get('destroy/{id}', 'skuDestroy')->name('destroy')->middleware(['auth','admin']);
        });
});


