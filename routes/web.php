<?php

use App\Models\Products;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $products = Products::all();
    return view('welcome', compact('products'));
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home/view/{id}', [App\Http\Controllers\HomeController::class, 'custview']);
Route::get('home/addcart/{id}', [App\Http\Controllers\HomeController::class, 'addcart']);
Route::get('home/cart', [App\Http\Controllers\HomeController::class, 'cart']);
Route::get('/home/checkout', [App\Http\Controllers\HomeController::class, 'checkout']);
Route::post('home/addaddress', [App\Http\Controllers\HomeController::class, 'storeit']);



// routes of admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('delete/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'delete']);
    Route::get('approve/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'approve']);
    Route::get('view/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'admview']);
    Route::get('delivered/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'delivered']);
    Route::get('orders', [App\Http\Controllers\Admin\DashboardController::class, 'admorder']);
});

// routes of Employee
Route::prefix('employee')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'employeedash']);
    Route::get('view/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'empview']);
    Route::get('add', [App\Http\Controllers\Admin\DashboardController::class, 'prodadd']);
    Route::post('add', [App\Http\Controllers\Admin\DashboardController::class, 'storeprod']);
    Route::get('edit/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'edit']);
    Route::get('delete/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'delete']);
    Route::put('edit/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'update']);
});
// Route::prefix('customer')->middleware(['auth','isAdmin'])->group(function (){
//     Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'custdash']);
// });