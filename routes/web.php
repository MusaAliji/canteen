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

Auth::routes();

Route::resource('/canteens','CanteenController');

Route::get('/canteens/{canteen}/create_product','CanteenController@createProduct');
Route::post('/canteens/{canteen}','CanteenController@storeProduct');
Route::post('/orderstore','OrderController@store');

Route::resource('/products','ProductController');
Route::resource('/degrees','DegreeController');
Route::resource('/kinds','KindController');
Route::resource('/departments','DepartmentController');
Route::resource('/rooms','RoomController');
Route::resource('/users','UserController');
Route::get('/orders','OrderController@index');


Route::get('/home', 'CanteenController@index');
Route::get('/canteen', 'CanteenController@owner');
Route::get('/profile', 'UserController@owner');


Route::get('/markAsRead',function (){
    auth()->user()->unreadNotifications->markAsRead();
});

