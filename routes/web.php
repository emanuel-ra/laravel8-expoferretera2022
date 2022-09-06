<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProspectsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\QuoteController;

/* * * EXPORT EXCEL * * */
use App\Exports\ProspectsExport;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/{page?}',[HomeController::class,'index'])->name('home');

Route::prefix('prospects')->group(function () {
    Route::get('/list',[ProspectsController::class,'index'])->name('prospects_list');
    Route::get('/new',[ProspectsController::class,'form_add'])->name('prospects_add');
    Route::get('/edit/{id}',[ProspectsController::class,'form_edit'])->name('prospects_edit');
    Route::post('/store',[ProspectsController::class,'store'])->name('prospects_store');
    Route::post('/update/{id}',[ProspectsController::class,'update'])->name('prospects_update');
    Route::get('/download',[ProspectsController::class,'download'])->name('prospects_download');   

});

Route::prefix('products')->group(function () {
    Route::get('/view/{id}',[ProductsController::class,'view'])->name('prospects_view');
});


Route::prefix('cart')->group(function () {
    Route::get('/items',[CartController::class,'get'])->name('cart');
    Route::get('/add/{id}',[CartController::class,'add'])->name('cart_add');
    Route::get('/plus/{id}',[CartController::class,'plus'])->name('cart_plus');
    Route::get('/minus/{id}',[CartController::class,'minus'])->name('cart_minus');    
    Route::get('/remove/{id}',[CartController::class,'remove'])->name('cart_remove');    
    Route::post('/update',[CartController::class,'update'])->name('cart_update');        
    Route::post('/price',[CartController::class,'set_price'])->name('cart_price');        
});

Route::prefix('quote')->group(function (){
    Route::get('/list',[QuoteController::class,'get'])->name('quote');
    Route::get('/pdf/{id}',[QuoteController::class,'create_pdf'])->name('pdf');
    Route::post('/save',[QuoteController::class,'save'])->name('quote_save');                 
});

/*
    * *EXPORT DATA AS EXCEL
*/
Route::prefix('excel')->group(function (){
    Route::get('/prospects', function () {
        return Excel::download(new ProspectsExport, 'prospects.xlsx');
    });
});