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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('vendor', 'VendorController@vendor');
Route::post('vendordetail', 'VendorController@vendordetail');
Route::post('reject-order', 'VendorController@rejectOrders');
Route::post('employee', 'EmployeeController@employee');
Route::post('register', 'AuthController@register');
Route::post('vendor-register', 'AuthController@vendorRegister');
Route::post('login', 'AuthController@login');
Route::post('vendor-login', 'AuthController@vendorLogin');
Route::post('recover', 'AuthController@recover');
Route::post('calc', 'CalculateController@calc');
Route::post('getcalData', 'CalculateController@getcalData');
Route::post('changepassword', 'AuthController@changepassword');
Route::get('category', 'CategoryController@categoryList');
Route::get('cablist/{email}', 'EmployeeController@cablist');
Route::get('vendorcar/{id}', 'VendorController@vendorcar');
Route::get('vlist', 'EmployeeController@vendorlist');
Route::get('users/{email}', 'AuthController@getUser');
Route::get('cabDetails/{email}', 'VendorController@cabList');
Route::get('orders/{email}', 'EmployeeController@orderList');
Route::get('OrderHistory/{email}', 'VendorController@orderHistory');
Route::get('cabno/{email}', 'EmployeeController@cabno');
Route::get('orderno/{email}', 'EmployeeController@orderno');
Route::get('payment/{email}', 'CalculateController@payment');
Route::get('startinfo/{id}', 'CalculateController@startinfo');
Route::get('endjourney/{id}','CalculateController@endjourney');

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');
    // Route::get('test', function(){
    //     return response()->json(['foo'=>'bar']);
    // });

     // Route::post('employee', 'EmployeeController@employee');

});
