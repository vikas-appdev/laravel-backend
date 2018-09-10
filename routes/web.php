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
    return view('welcome');
});

// Route::get('user/verify/{verification_code}', 'AuthController@verifyUser');
// Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
// Route::post('password/reset', 'Auth\PasswordController@reset');

Route::group(['prefix' => 'admin'], function () {
	
Route::get('/', function () {
    return redirect('admin/login');
});


			// Authentication Routes...
		
			Route::get('login', [
		  'as' => 'login',
		  'uses' => 'Auth\LoginController@showLoginForm'
			]);
			Route::post('login', [
			  'as' => '',
			  'uses' => 'Auth\LoginController@login'
			]);
	

			// Password Reset Routes...
			Route::post('password/email', [
			  'as' => 'password.email',
			  'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
			]);
			Route::get('password/reset', [
			  'as' => 'password.request',
			  'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
			]);
			Route::post('password/reset', [
			  'as' => '',
			  'uses' => 'Auth\ResetPasswordController@reset'
			]);
			Route::get('password/reset/{token}', [
			  'as' => 'password.reset',
			  'uses' => 'Auth\ResetPasswordController@showResetForm'
			]);

			// Registration Routes...
			Route::get('register', [
			  'as' => 'register',
			  'uses' => 'Auth\RegisterController@showRegistrationForm'
			]);
			Route::post('register', [
			  'as' => '',
			  'uses' => 'Auth\RegisterController@register'
			]);


		

    
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
	
	Route::get('/home', 'HomeController@index');

	Route::resource('product-category', 'ProductCategoryController');
	Route::get('/user', 'Admin\UserController@index');
	Route::delete('user/{id}', array('uses' => 'Admin\UserController@destroy', 'as' => 'user.destroy'));
	Route::get('/user/create', ['uses' => 'Admin\UserController@create', 'as' => 'user.create']);
	Route::get('/user/genpass/{id}', 'Admin\UserController@pass');
	Route::post('/user/store', ['uses' => 'Admin\UserController@store', 'as' => 'user.store']);
	Route::get('/user/{id}/edit', ['uses' => 'Admin\UserController@edit', 'as' => 'user.edit']);
	Route::patch('user/{id}', ['uses' => 'Admin\UserController@update', 'as' => 'user.update']);

	

	Route::get('orders', 'Admin\OrderController@orders');
	Route::delete('orders/{id}', ['uses' => 'Admin\OrderController@orders', 'as' => 'order.destroy']);

	Route::get('rejectOrders', 'Admin\OrderController@rejectOrders');

	Route::get('cab-detail', 'Admin\VendorController@cab');
	Route::post('cabdetail', 'Admin\VendorController@cabdetail');
	Route::get('cabdetail/{id}/edit', ['uses' => 'Admin\VendorController@edit', 'as' => 'cab.edit']);
	Route::patch('cabdetail/{id}', ['uses' => 'Admin\VendorController@update', 'as' => 'cab.update']);
	Route::delete('cabdetail/{id}', ['uses' => 'Admin\VendorController@destroy', 'as' => 'cab.destroy']);
				Route::post('logout', [
			  'as' => 'logout',
			  'uses' => 'Auth\LoginController@logout'
			]);

	Route::get('cab-list', 'Admin\VendorController@cablist');
	Route::post('cablistdetail', 'Admin\VendorController@cablistdetail');
	Route::get('cablist/{id}/edit', ['uses' => 'Admin\VendorController@cablistedit', 'as' => 'cablist.edit']);
	Route::patch('cablist/{id}', ['uses' => 'Admin\VendorController@cablistupdate', 'as' => 'cablist.update']);
	Route::delete('cablist/{id}', array('uses' => 'Admin\VendorController@cablistdestroy', 'as' => 'cablist.destroy'));
	
	Route::get('car_type/{owner}', 'Admin\VendorController@car_type');

	Route::get('payment', 'Admin\PaymentController@index');
	Route::get('payment/{id}', 'Admin\PaymentController@viewDetails');

	Route::get('export-payment', 'Admin\PaymentController@export');

	Route::get('journey', 'Admin\JourneyController@journey');

});






