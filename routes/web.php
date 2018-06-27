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

Route::get('auth/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home_guest', 'HomeController@homeGuest')->name('home_guest');
Route::get('/business_register','HomeController@businessSignUp');
Route::get('show','UserController@showUsers')->name('users_info');
Route::get('users','UserController@getIndex')->name('users');
Route::post('users','UserController@store')->name('users.store');
Route::get('create_user','UserController@create');
Route::group(['middleware' => 'auth'], function () {
        Route::get('/link1', function ()    {
        // Uses Auth Middleware
    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
