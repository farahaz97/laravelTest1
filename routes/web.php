<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\UserController;

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
//     return view('index');
// });


  Route::get('/', [
    'uses' => 'App\Http\Controllers\productController@getIndex',
    'as' => 'index'
  ]);

  // Route::group(['middleware' => 'guest'], function(){});
  Route::middleware(['guest'])->group(function () {
    Route::get('/signup', [
      'uses' => 'App\Http\Controllers\UserController@getSignup',
      'as' => 'signup'      
    ]);
  
    Route::post('/signup', [
      'uses' => 'App\Http\Controllers\UserController@postSignup',
      'as' => 'signup'
    ]);
  
    Route::get('/signin', [
      'uses' => 'App\Http\Controllers\UserController@getSignin',
      'as' => 'signin'
    ]);
  
    Route::post('/signin', [
      'uses' => 'App\Http\Controllers\UserController@postSignin',
      'as' => 'signin'
    ]); 
  });

Route::middleware(['auth'])->group(function () {
    
  Route::get('/profile', [
    'uses' => 'App\Http\Controllers\UserController@getProfile',
    'as' => 'profile',
    'middleware' =>'auth'
  ]);
  
  Route::get('/logout', [
    'uses' => 'App\Http\Controllers\UserController@getLogout',
    'as' => 'logout',
    'middleware' =>'auth'
  ]);
  
});

  Route::get('/add-to-cart/{id}', [
    'uses' => 'App\Http\Controllers\productController@getAddToCart',
    'as' => 'addToCart'
  ]);
  
  Route::get('/shoppingCart', [
    'uses' => 'App\Http\Controllers\productController@getCart',
    'as' => 'shoppingCart'
  ]);
  
  Route::get('/checkout}', [
    'uses' => 'App\Http\Controllers\productController@getCheckout',
    'as' => 'checkout'
  ]);
  
