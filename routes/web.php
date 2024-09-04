<?php

use Illuminate\Support\Facades\Route;

// get -> to retrieve
// post -> insert new data
// put|path -> update data
// delete -> delete data

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('frontend.index');
Route::get('shop_item/{id}', [App\Http\Controllers\FrontendController::class, 'shopItem'])->name('frontend.shop_item');
Route::get('checkout',[App\Http\Controllers\FrontendController::class,'checkOut'])->name('frontend.checkout');
Route::post('order_now',[App\Http\Controllers\FrontendController::class, 'orderNow'])->name('frontend.orderNow');
Route::get('products/category/{id}',[App\Http\Controllers\FrontendController::class, 'productCategory'])->name('products.category');

Route::group(['middleware'=>['auth'], 'prefix'=>'backend', 'as'=>'backend.'],function(){
    Route::get('/',[App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
    Route::resource('products',App\Http\Controllers\Admin\ProductController::class);
    Route::get('orders',[App\Http\Controllers\Admin\OrderController::class,'index'])->name('order.index');
    Route::get('orders/accept',[App\Http\Controllers\Admin\OrderController::class, 'orderAccept'])->name('orders.accept');
    Route::get('orders/complete',[App\Http\Controllers\Admin\OrderController::class, 'orderComplete'])->name('orders.complete');
    Route::get('orders/detail/{voucher_no}',[App\Http\Controllers\Admin\OrderController::class, 'orderDetail'])->name('orders.detail');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
