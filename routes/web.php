<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\Users\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StaffController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::delete('destroy', [MenuController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::delete('destroy', [ProductController::class, 'destroy']);
        });

        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::delete('destroy', [SliderController::class, 'destroy']);
        });

        #Upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

        #Cart
        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
        Route::get('customers/shippings/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'update']);

        #Help
        Route::get('help', [\App\Http\Controllers\Admin\HelpController::class, 'index']);

        #Staff
        Route::prefix('staffs')->group(function () {
            Route::get('add', [StaffController::class, 'create']);
            Route::post('add', [StaffController::class, 'store']);
            Route::get('list', [StaffController::class, 'index']);
            Route::get('edit/{Staff}', [StaffController::class, 'show']);
            Route::post('edit/{Staff}', [StaffController::class, 'update']);
            Route::delete('destroy', [StaffController::class, 'destroy']);
        });
    });
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index']);

Route::get('/contact', [App\Http\Controllers\MainController::class, 'showcontact']);

Route::get('danh-muc/{id}-{slug?}', [App\Http\Controllers\MenuController::class, 'index']);

Route::get('san-pham/{id}-{slug?}', [App\Http\Controllers\ProductController::class, 'index']);

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);

Route::get('logout', [App\Http\Controllers\MainController::class, 'logout']);
Route::get('users/login', [App\Http\Controllers\MainController::class, 'login']);
Route::post('users/login/store', [App\Http\Controllers\MainController::class, 'store']);

Route::get('profile', [App\Http\Controllers\MainController::class, 'profile']);

Route::get('users/singup', [App\Http\Controllers\MainController::class, 'singup']);
Route::post('users/singup/store', [App\Http\Controllers\MainController::class, 'create']);

Route::get('/search', [App\Http\Controllers\MainController::class, 'search'])->name('search');
