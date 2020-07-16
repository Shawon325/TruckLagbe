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


Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});
 
//Route::get('/admin', function () {
//    return view('Backend.dashboard');
//});

Route::get('/admin', 'HomeController@index');

Route::prefix('admin')->group(function(){
    Route::middleware('auth')->group(function () {
        // Division
        Route::resource('/division', 'DivisionController');
        Route::post('/division/store', 'DivisionController@store');
        Route::post('/division/update', 'DivisionController@update');
        Route::get('/division/show/{id}', 'DivisionController@show');
         //District
        Route::resource('/district', 'DistrictController');
        Route::post('/district/store', 'DistrictController@store');
        Route::post('/district/update', 'DistrictController@update');
        Route::get('/district/show/{id}', 'DistrictController@show');
         //Upzilla
        Route::resource('/upzilla', 'UpzillaController');
        Route::post('/upzilla/store', 'UpzillaController@store');
        Route::post('/upzilla/update', 'UpzillaController@update');
        Route::get('/upzilla/show/{id}', 'UpzillaController@show');

        //Part of Truck

        //Ton
        Route::resource('/ton', 'TonController');
        Route::post('/ton/store', 'TonController@store');
        Route::post('/ton/update', 'TonController@update');
        Route::get('/ton/show/{id}', 'TonController@show');
        //Truck


    });
});
