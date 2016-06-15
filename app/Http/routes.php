<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


/**
 * API PRIVADAS
 */
Route::group(['prefix' => 'api','middleware' => ['auth', 'auth.admin']], function() {

    Route::group(['middleware' => ['auth', 'auth.admin']], function(){
          Route::controller('products', 'API\ProductsController');
          Route::controller('categories', 'API\CategoriesController');
          Route::controller('subcategories', 'API\SubCategoriesController');
          Route::post('media/uploadFiles', 'API\MediaController@uploadFiles');
    });

});
Route::group(['as' => 'admin::', 'prefix' => 'admin','middleware' => ['auth', 'auth.admin']], function() {

    Route::get('/', 'AdminController@getIndex');// BASE PATH ADMIN
    Route::group(['prefix'=>'products','middleware' => ['auth', 'auth.admin']], function(){

          Route::get('/list', 'ProductsController@getList');
          Route::get('/edit/{id}', 'ProductsController@getEdit');
          Route::get('/new', 'ProductsController@getNew');
    });
    Route::group(['prefix'=>'categories','middleware' => ['auth', 'auth.admin']], function(){

          Route::get('/list', 'CategoriesController@getList');
          Route::get('/edit/{id}', 'CategoriesController@getEdit');
          Route::get('/new', 'CategoriesController@getNew');
    });
    Route::group(['prefix'=>'subcategories','middleware' => ['auth', 'auth.admin']], function(){

          Route::get('/list', 'SubCategoriesController@getList');
          Route::get('/edit/{id}', 'SubCategoriesController@getEdit');
          Route::get('/new', 'SubCategoriesController@getNew');
    });


});
