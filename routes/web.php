<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StockController;

Route::get('/', [Controller::class,'home'])->name('home');


// Views
Route::get('/stock',[Controller::class,'stockHome'])->name('stock');
Route::get('/instrument-details/{type}/{symbol}',[Controller::class,'instrumentDetails'])->name('instrument-details');
Route::get('/crypto',[Controller::class,'cryptoHome'])->name('crypto');
Route::get('/etc',[Controller::class,'etcHome'])->name('etc');
Route::get('/etf',[Controller::class,'etfHome'])->name('etf');
Route::get('/fund',[Controller::class,'fundHome'])->name('fund');
Route::get('/commodity',[Controller::class,'commodityHome'])->name('commodity');
Route::get('/mf',[Controller::class,'mfHome'])->name('mf');
Route::get('/index',[Controller::class,'indexHome'])->name('index');

Route::get('/page-not-found', function(){ return view('page-not-found');})->name('pagenotfound');

//JSON responses
Route::get('/gold-data/{id}', [DashboardController::class, 'getGoldData']);
