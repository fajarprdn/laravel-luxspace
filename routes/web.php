<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/details/{slug}',[FrontendController::class,'details'])->name('details');
Route::get('/cart',[FrontendController::class,'cart'])->name('cart');
Route::get('/checkout/success',[FrontendController::class,'success'])->name('checkout-success');


Route::middleware([
    'auth:sanctum',
    'verified'
])->name('dashboard.')->prefix('dashboard')->group(function (){
    Route::get('/', [DashboardController::class, 'index'])->name('index');//dashboard.index

    Route::middleware(['admin'])->group(function (){

    });
});