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
    $businesses = \App\Slide::first()->businesses;
    $templates = array();
    foreach ($businesses as $business ){
        $temp = \App\BusinessTemplate::where('business_id',$business->id)->first();
        $temp->business_name = $business->business_name;
        array_push($templates,$temp);

    }
//    dd($templates);
    return view('welcome',compact('templates'));
});
Route::middleware(['web'])->group(function(){

    Route::group(['middleware' => 'auth'], function () {

        Route::get('slide_manager','SlideManagerController@index');
        Route::get('get_slides','SlideManagerController@getSlides')->name('get_slides');
        Route::resource('slides', 'SlideManagerController');
        Route::get('/slides/delete/{slide}','SlideManagerController@destroy');
        Route::post('slides/update/{slide}','SlideManagerController@update');

        Route::post('add_bussiness_type','UserController@addBussinessType')->name('add_bussiness_type');
        Route::resource('businesses', 'BussinessController');
        Route::post('businesses/update/{business}','BussinessController@update');
        Route::get('get_businesses','BussinessController@getBusiness')->name('get_businesses');
        Route::get('business_delete/{id}','BussinessController@destroy');
        Route::post('business/update/{package}','BussinessController@update');

        Route::post('packages_contracts','BussinessController@packagesContracts')->name('package_contracts');
        Route::get('packages-contracts','BussinessController@navigateToPackages');
        Route::get('packages-contracts-biz','BussinessController@navigateToPackagesAdmin');
        Route::resource('packages', 'PackageController');
        Route::resource('package_features', 'PackageFeatureController');

        Route::resource('referral_codes','ReferralCodeController');
        Route::get('/get-biz-template/{id}','BussinessController@getBizTemplate');

        Route::get('packages/delete/{id}','PackageController@destroy');
        Route::post('packages/update/{package}','PackageController@update');
        Route::get('package_features/delete/{id}','PackageFeatureController@destroy');
        Route::post('package_features/update/{package}','PackageFeatureController@update');
    });


    Route::get('/account-creation-success','Auth\RegisterController@accountSuccess');


    Route::get('get_packages','PackageController@getPackages')->name('get_packages');
    Route::get('get_features','PackageFeatureController@getPackageFeatures')->name('get_features');
    Route::get('get_codes','ReferralCodeController@getReferralCodes')->name('get_codes');
    Route::get('referral_codes/delete/{id}','ReferralCodeController@destroy');
    Route::get('verify_referral_code/{code}','ReferralCodeController@verifyCode');

    Route::get('/save_package/{package}','BussinessController@saveBizPackage');
    Route::get('/business-portal','BussinessController@showBizPortal');
    Route::get('/get-avatar','UserController@getAvatar');

    Route::get('biz_types_index','UserController@bussinessTypesIndex');
    Route::post('template_selection','UserController@templateSelection');
    Route::post('template_selection_biz','UserController@templateSelectionBiz');
    Route::get('business-signup-finish','UserController@templatePreview');
    Route::get('business-signup-finish-biz','UserController@templatePreviewBiz');

    Route::get('auth/{provider}', 'SocialAuthController@redirectToProvider');
    Route::get('auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home_guest', 'HomeController@homeGuest')->name('home_guest');

    Route::get('/business_register','HomeController@businessSignUp');
    Route::get('/admin_business_register','HomeController@businessSignUpAdmin');

    Route::get('show','UserController@showUsers')->name('users_info');
    Route::get('users','UserController@getIndex')->name('users');
    Route::post('users','UserController@store')->name('users.store');
    Route::get('create_user','UserController@create');
    Route::get('biz_type/{type}','UserController@editBussinessType');
    Route::get('biz_type/show/{type}','UserController@showBussinessType');
    Route::get('biz_type/delete/{type}','UserController@destroyBussinessType');
    Route::post('/update_bussiness_type/{type}','UserController@updateBussinessType');

    Route::get('bussiness_types','UserController@showBusinessTypes')->name('bussiness_types');
    Route::get('the_go_tcs','HomeController@getTCS');
    Route::get('/account_not_verified','Auth\RegisterController@accountNotRegistered');
    Route::get('/verify_email/{token}', 'Auth\RegisterController@verify');
    Route::get('/account_creation_success','Auth\RegisterController@accountSuccess');
});



