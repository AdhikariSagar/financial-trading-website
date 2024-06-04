<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CryptocurrencyController;


Route::get('/', [DashboardController::class, 'index'])->name('home');

// Views
Route::get('/stock',function(){ return view('stock'); })->name('stock');
Route::get('/cryptocurrency',function(){ return view('cryptocurrency');})->name('cryptocurrency');
Route::get('/etc',function(){ return view('exchage-traded-commodity');})->name('etc');
Route::get('/etf',function(){ return view('exchange-traded-fund');})->name('etf');
Route::get('/fund',function(){ return view('fund'); })->name('fund');
Route::get('/commodity',function(){  return view('commodity'); })->name('commodity');
Route::get('/mf',function(){ return view('mutual-fund'); })->name('mf');
Route::get('/index',function(){ return view('index'); })->name('index');


Route::get('/exchange',[ExchangeController::class,'getAll'])->name('exchange');
Route::get('exchange-details/{symbol}',[ExchangeController::class,'exchangeDetail'])->name('exchange-details');


//JSON responses
Route::get('/gold-data/{id}', [DashboardController::class, 'getGoldData']);
