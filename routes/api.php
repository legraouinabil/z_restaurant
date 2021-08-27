<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group(['middleware' => 'api'],function () {
   
   
});

    Route::get('category', 'CategoryController@index');
    Route::get('produit', 'ProduitController@index');
    Route::get('produitImage', 'ProduitImageController@index');
    Route::get('logout', 'ApiController@logout');
    Route::get('logout', 'ApiController@logout');
    Route::post('login', 'ApiController@login');
    Route::post('register', 'ApiController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout');
    Route::apiresource('category' , 'CategoryController')->except('index');
    Route::apiresource('image' , 'ProduitImageController')->except('index');
    Route::apiresource('produit' , 'ProduitController')->except('index');
    Route::apiresource('order' , 'OrderController')->only('index' , 'show' ,'destroy');

});







