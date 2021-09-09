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

   
    Route::get('logout', 'ApiController@logout');
    Route::get('logout', 'ApiController@logout');
    Route::post('login', 'ApiController@login');
    Route::post('register', 'ApiController@register');
    Route::post('addOrder' , 'OrderController@store');
    Route::post('addFeedback' , 'FeedbackController@store');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout');
    Route::apiresource('category' , 'CategoryController');
    Route::apiresource('image' , 'ProduitImageController');
    Route::apiresource('produit' , 'ProduitController');
    Route::apiresource('order' , 'OrderController')->except('store');
    Route::apiresource('feedback' , 'FeedbackController')->except('store');

});

Route::get('site', 'FrontController@index');






