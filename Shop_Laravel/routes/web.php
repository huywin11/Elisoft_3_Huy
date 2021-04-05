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
// Route::get('index',function(){
//      return view('index');
// });
// Route::get('index',[
//   'as'=>'index',
//   'uses'=>'App\Http\Controllers\HomeController@Home'
// ]);
Route::get('index',[
  'as'=>'index',
  'uses'=>'App\Http\Controllers\PageController@getIndex'
]);
Route::get('trangchu',[
  'as'=>'trang-chu',
  'uses'=>'App\Http\Controllers\PageController@getProduct'
]);
Route::get('noProduct',[
  'as'=>'noProduct',
  'uses'=>'App\Http\Controllers\PageController@getnoProduct'
]);
Route::get('detail/{id}',[
'as' =>'detail',
'uses'=>'App\Http\Controllers\PageController@getDetailProduct'
]);
Route::get('listing/{category_id}',[
'as' =>'listing',
'uses'=>'App\Http\Controllers\PageController@getListingProduct'
]);
Route::get('cart/{category_id}',[
'as' =>'cart',
'uses'=>'App\Http\Controllers\PageController@getCart'
]);
Route::get('login',[
  'as'=>'login',
  'uses'=>'App\Http\Controllers\PageController@getLogin'
]);
Route::post('login',[
  'as'=>'login',
  'uses'=>'App\Http\Controllers\PageController@postLogin'
]);
Route::get('register',[
  'as'=>'register',
  'uses'=>'App\Http\Controllers\PageController@getRegister'
]);
Route::post('register',[
  'as'=>'register',
  'uses'=>'App\Http\Controllers\PageController@postRegister'
]);
Route::get('logout',[
  'as'=>'logout',
  'uses'=>'App\Http\Controllers\PageController@getLogout'
]);
Route::get('Search',[
  'as'=>'search',
  'uses'=>'App\Http\Controllers\PageController@getSearch'
]);
Route::get('/users/profile',[
  'as'=>'profile',
  'uses'=>'App\Http\Controllers\UsersController@profile'
]);
Route::prefix('cat')->group(function () {
    Route::get('',['as'=>'cart','uses'=>'App\Http\Controllers\CartController@getCart']);
    Route::get('/add/{id}/{qty}',['as'=>'add_to_cart','uses'=>'App\Http\Controllers\CartController@getAddToCart']);
    Route::post('/update',['as'=>'update_to_cart','uses'=>'App\Http\Controllers\CartController@updateToCart']);
    Route::get('/remove/{id}',['as'=>'remove_from_cart','uses'=>'App\Http\Controllers\CartController@removeFromCart']);
});
