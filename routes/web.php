<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

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

    Route::get('books', [BookController::class, 'index'])->name('books.index');

    Route::get('books/create', [BookController::class, 'create'])->name('create');
    Route::post('books/create', [BookController::class, 'store'])->name('store');

    Route::get('books/{id}', [BookController::class, 'edit'])->name('edit');
    Route::post('books/{id}', [BookController::class, 'update'])->name('update');

    Route::get('books/delete/{id}', [BookController::class, 'destroy'])->name('delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
