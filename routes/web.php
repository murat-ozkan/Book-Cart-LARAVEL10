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

// Route::controller(TestController::class)->group(function () {
//     Route::get('admin/test', 'test')->name('test');
//     Route::get('admin/detail', 'detail')->name('detail');
// });

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('test', [TestController::class, 'test'])->name('test');
    Route::get('detail', [TestController::class, 'detail'])->name('detail');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
