<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TicketController;
use App\Http\Controllers\BuyerController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// This is the route for tickets api.
Route::middleware('api')
    ->resource(
        'tickets', TicketController::class
    );
Route::middleware('api')
    ->get(
        'tickets/{ticket}/available',
        'App\Http\Controllers\TicketController@available'
    );
Route::middleware('api')
    ->post(
        'tickets/{ticket}/sells',
        'App\Http\Controllers\TicketController@sells'
    );

// This is the route for buyers api.
Route::middleware('api')
    ->resource(
        'buyers', BuyerController::class
    );
