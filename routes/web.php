<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewController;
use App\Http\Controllers\Admin\CkeditorController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\Product_imagesController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\WishlistController;
use App\Http\Controllers\Admin\TurnoverController;

use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ProfileController;
use App\Http\Controllers\Website\CrawlerController;
use App\Http\Controllers\Website\ProductController as PController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\NewsController;
use App\Http\Controllers\Website\SearchController;

use App\Http\Controllers\LoginController;


use App\Http\Controllers\SendEmailController;
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




Route::get('verify/{uuid}',[LoginController::class,'verify'])->name('verify');





Route::name('website.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/check', [CartController::class, 'check'])->name('check');

    Route::post('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/searchNow', [SearchController::class, 'searchNow'])->name('searchNow');

    Route::post('/postComment/{uuid}', [NewsController::class, 'postComment'])->name('postComment');
    Route::get('/postComment/{uuid}', [NewsController::class, 'postNow'])->name('postNow');

    Route::get('/profile/{uuid}', [ProfileController::class, 'account'])->name('account');
    Route::get('/profile/edit/{uuid}', [ProfileController::class, 'accountEdit'])->name('accountEdit');
    Route::post('/profile/update/{uuid}', [ProfileController::class, 'accountUpdate'])->name('accountUpdate');
    Route::get('/profile/order/{id}', [ProfileController::class, 'accountOrder'])->name('accountOrder');

    
    Route::get('/product/{id}', [PController::class, 'product'])->name('product');

    Route::get('/product_countdown/{id}', [PController::class, 'product_countdown'])->name('product_countdown');

    Route::get('/price/5tr/{id}', [PController::class, 'price'])->name('price');
    Route::get('/price/5-15tr/{id}', [PController::class, 'price10tr'])->name('price10tr');
    Route::get('/price/15tr-25tr/{id}', [PController::class, 'price20tr'])->name('price20tr');
    Route::get('/price/25tr/{id}', [PController::class, 'price25tr'])->name('price25tr');
    Route::get('/category/{id}', [PController::class, 'category'])->name('category');
    Route::get('/category/parent/{id}', [PController::class, 'categoryParent'])->name('categoryParent');
    
    Route::get('/add-to-cart/{id}/{quantity?}', [CartController::class, 'addToCart'])->name('addToCart');
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('updateCart');
    Route::get('/remove-item-cart/{id}', [CartController::class, 'removeItemCart'])->name('removeItemCart');
    Route::get('/cart/{uuid}', [CartController::class, 'cart'])->name('cart');

    Route::get('/add-to-wishlist/{id}/{quantity?}', [CartController::class, 'addToWishList'])->name('addToWishList');
    Route::get('/add-to-wishlist-new/{id}/{quantity?}', [CartController::class, 'addToWishListNew'])->name('addToWishListNew');
    Route::get('/wishlist', [CartController::class, 'wishlist'])->name('wishlist');
    Route::get('/remove-wish-list/{id}', [CartController::class, 'removeWishList'])->name('removeWishList');

    Route::get('/checkout/{uuid}', [CartController::class, 'checkout'])->name('checkout');
    Route::post('checkout/store/{uuid}', [CartController::class, 'store'])->name('store');
    Route::get('/checkout/order_place/{uuid}', [CartController::class, 'order_place'])->name('order_place');

    Route::get('/detail/{id}', [PController::class, 'detail'])->name('detail');
    Route::post('/rating/product', [PController::class, 'ratingProduct'])->name('ratingProduct');

    


    Route::get('/blog', [NewsController::class, 'blog'])->name('blog');
    Route::get('/blog/detail/{title}', [NewsController::class, 'blogDetail'])
    ->name('blogDetail')
    ->where('uuid', '[a-zA-Z0-9-_]+');
    
    Route::post('/like', [NewsController::class, 'like'])->name('like');
    Route::post('/rating/post', [NewsController::class, 'rating'])->name('rating');
   

    Route::get('/comingsoon', [NewsController::class, 'comingSoon'])->name('comingSoon');
    Route::get('/aboutus', [NewsController::class, 'about'])->name('about');
    Route::get('/map', [NewsController::class, 'map'])->name('map');

    Route::get('/get-data', [CrawlerController::class, 'featchAllTGDD'])->name('getData');




});

Route::get('login', [LoginController::class, 'getLogin'])->name('getLogin');
Route::post('login', [LoginController::class, 'postLogin'])->name('postLogin');

Route::get('register', [LoginController::class, 'getRegister'])->name('getRegister');
Route::post('register', [LoginController::class, 'postRegister'])->name('postRegister');
Route::get('register/sendMail', [LoginController::class, 'sendMail'])->name('sendMail');

Route::get('password/forgot', [LoginController::class, 'getForgot'])->name('getForgot');
Route::post('password/forgot', [LoginController::class, 'sendResetLink'])->name('sendResetLink');
Route::get('password/reset/{token}', [LoginController::class, 'showResetFrom'])->name('showResetFrom');
Route::post('password/reset', [LoginController::class, 'resetPassword'])->name('resetPassword');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware('check_login')->group(function(){
    Route::post('ckeditor/image_upload',[CkeditorController::class, 'upload'])->name('upload');

    Route::controller(ProductController::class)->prefix('products')->name('products.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/unactive_products/{id}', 'unactive_products')->name('unactive_products');
        Route::get('/active_products/{id}', 'active_products')->name('active_products');
        Route::get('/create', 'create')->name('create');
      
        Route::get('/create_new', 'create_new')->name('create_new');
        Route::post('/store_new', 'store_new')->name('store_new');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{uuid}', 'edit')->name('edit');

        Route::post('/update/{uuid}', 'update')->name('update');
        Route::get('/destroy/{uuid}', 'destroy')->name('destroy');

        Route::get('/images/{uuid}', 'images')->name('images');
        Route::post('/store_images', 'store_images')->name('store_images');
        Route::get('/imagesEdit/{uuid}', 'imagesEdit')->name('imagesEdit');
        Route::post('/updateEdit/{uuid}', 'updateEdit')->name('updateEdit');

        Route::get('/add_gallery/{id}', 'add_gallery')->name('add_gallery');
        Route::post('/select_gallery', 'select_gallery')->name('select_gallery');

    });

   
    Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/unactive_categories/{id}', 'unactive_categories')->name('unactive_categories');
        Route::get('/active_categories/{id}', 'active_categories')->name('active_categories');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');

    });
    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/unactive_user/{id}', 'unactive_user')->name('unactive_user');
        Route::get('/active_user/{id}', 'active_user')->name('active_user');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{uuid}', 'edit')->name('edit');
        Route::post('/update/{uuid}', 'update')->name('update');
        Route::get('/destroy/{uuid}', 'destroy')->name('destroy');

    });
    Route::controller(NewController::class)->prefix('news')->name('news.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/unactive_news/{id}', 'unactive_news')->name('unactive_news');
        Route::get('/active_news/{id}', 'active_news')->name('active_news');
        Route::get('/unactive_comments/{id}', 'unactive_comments')->name('unactive_comments');
        Route::get('/active_comments/{id}', 'active_comments')->name('active_comments');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/acceptCmt', 'acceptCmt')->name('acceptCmt');
        Route::get('/DestroyCmt/{id}', 'DestroyCmt')->name('DestroyCmt');
        

    });
    Route::controller(WarehouseController::class)->prefix('warehouses')->name('warehouses.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{Wuuid}', 'edit')->name('edit');
        Route::post('/update/{Wuuid}', 'update')->name('update');
        Route::get('/destroy/{Wuuid}', 'destroy')->name('destroy');

    });
    Route::controller(WishlistController::class)->prefix('wishlists')->name('wishlists.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');

    });
    Route::controller(CalendarController::class)->prefix('calendars')->name('calendars.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{uuid}', 'edit')->name('edit');
        Route::post('/update/{uuid}', 'update')->name('update');
        Route::get('/destroy/{uuid}', 'destroy')->name('destroy');

    });
    Route::controller(SliderController::class)->prefix('sliders')->name('sliders.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/unactive_sliders/{id}', 'unactive_sliders')->name('unactive_sliders');
        Route::get('/active_sliders/{id}', 'active_sliders')->name('active_sliders');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');

    });
    Route::controller(OrderController::class)->prefix('orders')->name('orders.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/unactive_orders/{id}', 'unactive_orders')->name('unactive_orders');
        Route::get('/active_orders/{id}', 'active_orders')->name('active_orders');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');

    });
    Route::controller(TurnoverController::class)->prefix('turnovers')->name('turnovers.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/unactive_orders/{id}', 'unactive_orders')->name('unactive_orders');
        Route::get('/active_orders/{id}', 'active_orders')->name('active_orders');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');

    });
   
   
});