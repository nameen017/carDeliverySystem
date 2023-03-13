<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/car', 'App\Http\Controllers\CarController');
Route::get('/car/delete/{id}', 'App\Http\Controllers\CarController@destroy')->name('car.destroy');

Route::resource('/car-model', 'App\Http\Controllers\CarModelController');
Route::get('/car-model/delete/{id}', 'App\Http\Controllers\CarModelController@destroy')->name('car-model.destroy');
Route::get('getCarModel/{carId}', 'App\Http\Controllers\CarModelController@getCarModel');

Route::resource('/zone', 'App\Http\Controllers\ZoneController');
Route::get('/zone/delete/{id}', 'App\Http\Controllers\ZoneController@destroy')->name('zone.destroy');

Route::resource('/location', 'App\Http\Controllers\LocationController');
Route::get('/location/delete/{id}', 'App\Http\Controllers\LocationController@destroy')->name('location.destroy');
Route::get('getLocation/{zoneId}', 'App\Http\Controllers\LocationController@getLocation');

Route::resource('/customer', 'App\Http\Controllers\CustomerController');
Route::get('/customer/delete/{id}', 'App\Http\Controllers\CustomerController@destroy')->name('customer.destroy');

Route::resource('/delivery-transaction', 'App\Http\Controllers\DeliveryTransactionController');
Route::get('/delivery-transaction/delete/{id}', 'App\Http\Controllers\DeliveryTransactionController@destroy')->name('delivery-transaction.destroy');
