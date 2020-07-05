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
});

Route::prefix('console')->group(function () {

    Route::group(['middleware' => 'auth'], function(){
        //console dashboard
        Route::livewire('/dashboard', 'console.dashboard.index')->layout('layouts.console')->name('console.dashboard.index');

    });

});