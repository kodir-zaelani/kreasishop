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

Route::group(['middleware' => 'guest'], function(){

    //login page
    Route::livewire('/login', 'console.login')->layout('layouts.auth')->name('console.login');
    //logout page
    Route::livewire('/logout', 'console.logout')->layout('layouts.console')->name('console.logout');

    //register customer
    Route::livewire('/customer/register', 'customer.auth.register')
    ->layout('layouts.frontend')->name('customer.auth.register');
    //login customer
    Route::livewire('/customer/login', 'customer.auth.login')
    ->layout('layouts.frontend')->name('customer.auth.login');
});

Route::prefix('console')->group(function () {

    Route::group(['middleware' => 'auth'], function(){
        //console dashboard
        Route::livewire('/dashboard', 'console.dashboard.index')
        ->layout('layouts.console')->name('console.dashboard.index');

        //console categories
        Route::livewire('/categories', 'console.categories.index')
        ->layout('layouts.console')->name('console.categories.index');

        Route::livewire('/categories/create', 'console.categories.create')
        ->layout('layouts.console')->name('console.categories.create');

        Route::livewire('/categories/edit/{id}', 'console.categories.edit')
        ->layout('layouts.console')->name('console.categories.edit');

        //console products
        Route::livewire('/products', 'console.products.index')
        ->layout('layouts.console')->name('console.products.index');

        Route::livewire('/products/create', 'console.products.create')
        ->layout('layouts.console')->name('console.products.create');

        Route::livewire('/products/edit/{id}', 'console.products.edit')
        ->layout('layouts.console')->name('console.products.edit');

        //console vouchers
        Route::livewire('/vouchers', 'console.vouchers.index')
        ->layout('layouts.console')->name('console.vouchers.index');

        Route::livewire('/vouchers/create', 'console.vouchers.create')
        ->layout('layouts.console')->name('console.vouchers.create');

        Route::livewire('/vouchers/edit/{id}', 'console.vouchers.edit')
        ->layout('layouts.console')->name('console.vouchers.edit');

        //console orders
        Route::livewire('/orders', 'console.orders.index')
        ->layout('layouts.console')->name('console.orders.index');

        Route::livewire('/orders/{id}', 'console.orders.show')
        ->layout('layouts.console')->name('console.orders.show');

        Route::livewire('/orders/status/{id}', 'console.orders.status')
        ->layout('layouts.console')->name('console.orders.status');

        Route::livewire('/orders/receipt/{id}', 'console.orders.receipt')
        ->layout('layouts.console')->name('console.orders.receipt');

        //console payment
        Route::livewire('/payment', 'console.payment.index')
        ->layout('layouts.console')->name('console.payment.index');

        Route::livewire('/payment/{id}', 'console.payment.show')
        ->layout('layouts.console')->name('console.payment.show');

        //console sliders
        Route::livewire('/sliders', 'console.sliders.index')
        ->layout('layouts.console')->name('console.sliders.index');

        //console users
        Route::livewire('/users', 'console.users.index')
        ->layout('layouts.console')->name('console.users.index');

        Route::livewire('/users/create', 'console.users.create')
        ->layout('layouts.console')->name('console.users.create');

        Route::livewire('/users/edit/{id}', 'console.users.edit')
        ->layout('layouts.console')->name('console.users.edit');
    });

});

Route::get('/provinces', 'ApiController@getProvinces');
Route::get('/cities', 'ApiController@getCities');
Route::get('/districts', 'ApiController@getDistricts');
Route::post('/shipping', 'ApiController@getShipping');
Route::get('/check_voucher', 'ApiController@check_voucher');
Route::post('/checkout', 'ApiController@checkout');
Route::post('/waybill', 'ApiController@getWaybill');