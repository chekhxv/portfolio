<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('tuning-center.index');
})->name('tuning-center.index');

Route::get('/about', function () {
    return view('tuning-center.about');
})->name('about');

Route::get('/contacts', function () {
    return view('tuning-center.contacts');
})->name('contacts');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index']);

Route::group(['prefix' => 'admin', 'middleware' => ['isadmin']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

Route::get('/cart', [CartController::class, 'show'])->name('cart.show');

Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/services', [ServiceController::class, 'index'])->name('services');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/order-confirmation', [OrderController::class, 'confirmation'])->name('order.confirmation');

Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');

Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

Route::delete('/service/{id}/delete', [ServiceController::class, 'destroy'])->name('service.destroy');

Route::post('/admin/clients-by-service', [AdminController::class, 'getClientsByService'])->name('admin.getClientsByService');

Route::post('/services-by-cost', [AdminController::class, 'getServicesByCost'])->name('services-by-cost');

Route::post('/admin/clients-by-car', [AdminController::class, 'getClientsByCar'])->name('admin.clientsByCar');

Route::get('/admin/services-sorted-by-cost', [AdminController::class, 'getServicesSortedByCost'])->name('admin.getServicesSortedByCost');

Route::post('/admin/services-by-car', [AdminController::class, 'getServicesByCar'])->name('admin.getServicesByCar');

Route::get('/admin/get-all-cars', [AdminController::class, 'getAllCars'])->name('admin.getAllCars');

Route::post('/admin/update-service', [AdminController::class, 'updateService'])->name('admin.updateService');
