<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ModalController;
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
Route::get('/', [LoginController::class, 'index'], function (){
    return view('login');
})->name('/login');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');
Route::get('/home', [MainController::class, 'index'])->name('home')->middleware('auth');
Route::resource('order', OrderController::class)->middleware('auth');
Route::post('/import', [OrderController::class, 'import'])->name('import')->middleware('auth');
Route::post('/import-excel', [MainController::class, 'import'])->name('import-excel')->middleware('auth');
Route::resource('pengeluaran', ModalController::class)->middleware('auth');
Route::get('/laba', [MainController::class, 'laba'])->name('laba')->middleware('auth');
Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
    return redirect('/'); 
});
