<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware' => 'api'],function(){
    Route::get('workspaces','Api\ApiController@getAllWorkspaces');
    Route::get('Rooms/{id}','Api\ApiController@getAllWorkspacesRooms');
    Route::get('getbookingRooms/{id}','Api\ApiController@getAllBookingRooms');
    Route::post('bookingroom','Api\ApiController@BookRoom');
    Route::get('searchWorkspace/{name}','Api\ApiController@searchWorkspace');
});


