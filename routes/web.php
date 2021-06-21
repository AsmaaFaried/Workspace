<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});



Route::get('/home', 'HomeController@index')->name('home');

Route::post('/', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix'=>'workspace'],function(){
    Route::get('/profile','WorkProfile\ProfileController@create');
    Route::post('/profile','WorkProfile\ProfileController@store')->name('workprofile');
    
   
});

////// Start AddRooms ////////////
Route::get('/addRoom','WorkProfile\AddRoomController@create');
Route::post('/addRoom','WorkProfile\AddRoomController@store')->name('addroom');

Route::get('/addAnotherRoom','WorkProfile\AddAnotherRoomController@create');
Route::post('/addAnotherRoom','WorkProfile\AddAnotherRoomController@store')->name('AddAnotherRoom');

Route::get('/Rooms','WorkProfile\AddRoomController@display')->name('showroom');
Route::get('/editRoom/{id}','WorkProfile\AddRoomController@edit');
Route::put('/updateRoom/{id}','WorkProfile\AddRoomController@update')->name('update');
Route::get('/deleteRoom/{id}','WorkProfile\AddRoomController@delete');

////////// End AddRooms ///////////

//// Start Routes for BookingRooms ///////

Route::get('/bookingRoom','WorkProfile\BookingRoomController@create');
Route::post('/bookingRoom','WorkProfile\BookingRoomController@store')->name('bookingRoom');

Route::get('/Reservations','WorkProfile\BookingRoomController@display')->name('Reservations');
Route::put('/updateBooking/{id}','WorkProfile\BookingRoomController@update')->name('updateBooking');
Route::get('/editBooking/{id}','WorkProfile\BookingRoomController@edit');
Route::get('/deletebooking/{id}','WorkProfile\BookingRoomController@delete');

Route::get('/roomcheckin','WorkProfile\BookingRoomController@checkinroom')->name('roomChickin');
Route::get('/roomcheckout','WorkProfile\BookingRoomController@checkoutroom')->name('roomChickout');
Route::get('/roombill','WorkProfile\BookingRoomController@bill')->name('roomBill');


//// End Routes for BookingRooms /////