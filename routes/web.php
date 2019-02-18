<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    // ke Controller CategoryController ke method index
    Route::resource('/kategori', 'CategoryController')->except([
    'create', 'show'
    ]);

    // ke Controller ProductController ke method index
    Route::resource('/produk', 'ProductController');

    Route::get('/home', 'HomeController@index')->name('home');

});
