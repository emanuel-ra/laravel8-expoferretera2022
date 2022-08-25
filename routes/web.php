<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProspectsController;

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

// Route::get('/welcome', function () {
//      return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/',[HomeController::class,'index'])->name('home');

Route::prefix('prospects')->group(function () {
    Route::get('/',[ProspectsController::class,'index'])->name('prospects_list');
    Route::get('/new',[ProspectsController::class,'form_add'])->name('prospects_add');
    Route::post('/store',[ProspectsController::class,'store'])->name('prospects_store');
});

Route::prefix('products')->group(function () {
    Route::get('/view/{id}',[ProductsController::class,'view'])->name('prospects_view');
});