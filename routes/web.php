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
    return redirect('login');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth','admin','verified'])
    ->group(function(){
        Route::get('/dashboard','DashboardController@index')->name('dashboard');
        Route::resource('category', 'CategoryController');
    });