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

Route::prefix('admin')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::prefix('dashbord')->group(function () {
    Route::get('/products' , 'Dashbord\ManageProductsController@index')->name('product.index');
    Route::get('/products/{product}', 'Dashbord\ManageProductsController@show');
    Route::patch('/products/{product}', 'Dashbord\ManageProductsController@update');
});

Route::get('/products' , 'ProductController@index');
