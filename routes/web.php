<?php

use App\Models\Category;
use Illuminate\Http\Request;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','WelcomeController@index');

Route::post('/subCategory','WelcomeController@subCategory')->name('subCategory');
Route::post('/getProduct','WelcomeController@getProduct')->name('getProduct');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth','admin']], function (){

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });

    Route::get('/role-register','Admin\DashboardController@registerd');
    Route::get('/role-edit/{id}','Admin\DashboardController@edit');
    Route::put('/role-update/{id}','Admin\DashboardController@update');
    Route::delete('/role-delete/{id}','Admin\DashboardController@delete');


    Route::get('/product', 'Admin\\ProductController@index');
    Route::post('/save-product', 'Admin\\ProductController@store');
    Route::get('/product-edit/{id}', 'Admin\\ProductController@edit');
    Route::put('/product-update/{id}', 'Admin\\ProductController@update');
    Route::delete('/product-delete/{id}', 'Admin\\ProductController@delete');


});

Route::resource('category', 'CategoryController');


Route::get('/cart', 'Site\CartController@getCart')->name('checkout.cart');
Route::get('/cart/item/{id}/remove', 'Site\CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'Site\CartController@clearCart')->name('checkout.cart.clear');
Route::post('/product/add/cart{id}', 'Admin\ProductController@addToCart')->name('product.add.cart');



