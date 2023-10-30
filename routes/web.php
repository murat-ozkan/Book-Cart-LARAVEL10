<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('detail', [TestController::class, 'detail'])->name('detail');
Route::get('test', [TestController::class, 'test'])->name('test');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// Route::controller(TestController::class)->group(function () {
//     Route::get('admin/test', 'test')->name('test');
//     Route::get('admin/detail', 'detail')->name('detail');
// });

// Route::prefix('admin')->group(function () {
//     Route::get('test', [TestController::class, 'test'])->name('test');
//     Route::get('detail', [TestController::class, 'detail'])->name('detail');
// });