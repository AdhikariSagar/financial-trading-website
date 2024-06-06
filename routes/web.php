<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CryptocurrencyController;
use App\Http\Controllers\StockController;

Route::get('/', [DashboardController::class, 'index'])->name('home');

// Views
Route::get('/stock',[StockController::class,'home'])->name('stock');
Route::get('/stock-details/{id}',[StockController::class,'stockDetails'])->name('stock-details');
Route::get('/instrument-details/{type}/{symbol}',[Controller::class,'instrumentDetails'])->name('instrument-details');

Route::get('/cryptocurrency',function(){ return view('cryptocurrency');})->name('cryptocurrency');
Route::get('/etc',function(){ return view('exchage-traded-commodity');})->name('etc');
Route::get('/etf',function(){ return view('exchange-traded-fund');})->name('etf');
Route::get('/fund',function(){ return view('fund'); })->name('fund');
Route::get('/commodity',function(){  return view('commodity'); })->name('commodity');
Route::get('/mf',function(){ return view('mutual-fund'); })->name('mf');
Route::get('/index',function(){ return view('index'); })->name('index');
Route::get('/ethereum', function () {return view('ethereum');})->name('ethereum');


Route::get('/exchange',[ExchangeController::class,'getAll'])->name('exchange');
Route::get('exchange-details/{symbol}',[ExchangeController::class,'exchangeDetail'])->name('exchange-details');

Route::get('/page-not-found', function(){ return view('page-not-found');})->name('pagenotfound');

//JSON responses
Route::get('/gold-data/{id}', [DashboardController::class, 'getGoldData']);
