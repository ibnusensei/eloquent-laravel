<?php

use App\Http\Controllers\BeverageController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::resource('user', UserController::class);
Route::resource('country', CountryController::class);

Route::resource('order', OrderController::class);
Route::resource('food', FoodController::class);
Route::resource('beverage', BeverageController::class);

// Import and Export
Route::get('/file-import',[UserController::class,'importView'])->name('import-view');
Route::post('/import',[UserController::class,'import'])->name('import');
Route::get('/export-users',[UserController::class,'exportUsers'])->name('export-users');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
