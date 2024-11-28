<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/MainScreen', [AuthController::class, 'handleLogin'])->name('MainScreen');

Route::get('/MainScreen', function () {
    return view('MainScreen');
})->name('MainScreen');

Route::get('/orders', [OrderController::class, 'index'])->name('orders'); // To list orders
Route::get('/order/{id}', [OrderController::class, 'view'])->name('viewOrder'); // To view a specific order
Route::get('/order/edit/{id}', [OrderController::class, 'edit'])->name('editOrder'); // To edit an order
Route::delete('/order/delete/{id}', [OrderController::class, 'delete'])->name('deleteOrder'); // To delete an order
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::put('/order/update/{id}', [OrderController::class, 'update'])->name('updateOrder');
Route::get('/orders/create', [OrderController::class, 'create'])->name('createOrder');
Route::post('/orders', [OrderController::class, 'store'])->name('storeOrder');


Route::post('/logout', function () {
    Auth::logout();  // Logs out the user
    return redirect('/');  // Redirects to the welcome page or login page
})->name('logout');