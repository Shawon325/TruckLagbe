<?php
Auth::routes();
Route::get('/', 'FrontEndController@index');
Route::get("get_post", "FrontEndController@get_post");
//Route::get('/login', function () {
//    return view('auth.login');
//});

//Route::get('/admin', function () {
//    return view('Backend.dashboard');
//});

Route::get('/admin', 'HomeController@index');

Route::prefix('admin')->group(function () {
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
        //Ton
        Route::resource('/ton', 'TonController');
        Route::post('/ton/store', 'TonController@store');
        Route::post('/ton/update', 'TonController@update');
        Route::get('/ton/show/{id}', 'TonController@show');
        //Truck
        Route::resource('/truck', 'TruckController');
        Route::get('/truck/division/{division_id}', 'TruckController@division');
        Route::get('/truck/district/{district_id}', 'TruckController@district');
        Route::get('/truck/show/{id}', 'TruckController@show');
        Route::get('/truck_list', 'TruckController@truck_list');
        Route::get('/image/{id}', 'TruckController@image');
        //Posts
        Route::resource('/posts', 'PostsController');
        Route::get('/list', 'PostsController@list');
        Route::get('/posts/show/{id}', 'PostsController@show');
        Route::get('/posts/bidAdd/{post_id}', 'PostsController@bidAdd');
    });
});
