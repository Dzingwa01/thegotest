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

Route::get('/', function () {
    return redirect('login');
});

Route::post('add_bussiness_type','UserController@addBussinessType')->name('add_bussiness_type');

Route::get('biz_types_index','UserController@bussinessTypesIndex');
Route::post('template_selection','UserController@templateSelection');
Route::get('auth/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home_guest', 'HomeController@homeGuest')->name('home_guest');
Route::get('/business_register','HomeController@businessSignUp');
Route::get('show','UserController@showUsers')->name('users_info');
Route::get('users','UserController@getIndex')->name('users');
Route::post('users','UserController@store')->name('users.store');
Route::get('create_user','UserController@create');
Route::get('biz_type/{id}','UserController@editBussinessType');
Route::get('biz_type/show/{id}','UserController@showBussinessType');
Route::get('biz_type/delete/{id}','UserController@destroyBussinessType');

Route::get('bussiness_types','UserController@showBusinessTypes')->name('bussiness_types');
Route::group(['middleware' => 'auth'], function () {
        Route::get('/link1', function ()    {
        // Uses Auth Middleware
    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
