<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Route::get('/drink', function () {
    return view('drink');
});

Route::get('/admin/cashier', function () {
    return view('admin.index');
});

Route::get('/admin/cashier/dashboard', [AuthController::class, 'Dashboard'])->name('admin.dashboard');
Route::get('/admin/cashier/menu', [AuthController::class, 'menu'])->name('admin.menu');

Route::post('/admin/cashier/login', [AuthController::class, 'Login'])->name('login');

Route::post("/payments", [PaymentController::class, "store"]);
Route::post("/payments/notification", [PaymentController::class, "notification"]);
