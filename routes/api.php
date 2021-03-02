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

//Reset state before starting test
//POST /reset
//200 ok



Route::post( '/reset', '\App\Http\Controllers\ResetController@reset');

//Get balance for non-existing account
//GET /balance?acccount_id=1
//400 0


//Create account with initial balance
// Post /event  {"type":"deposit" ,"destination": "100", "amount":10}
//201 {"destination" {"id":"100", "balance":10}}


//Get balance for existing account
// get /balance?account_id=100
//200 20

Route::get('/balance', '\App\Http\Controllers\BalanceController@show');

//Withdraw from non-existing account
//Post /event {"type":"withdraw", "origin":"200", "amount":"10"}
//404 0


//Withdraw from exisiting account
//POST /event {"type":"withdraw", "origin":"100", "amount":5}
//201 {"oriign": {"id":"100", "valance":15}}


//Transfer from existing account
//Post /event {"type":"transfer", "origin":"100", "ammount":15, "destination:"300"}
//201 {"origin": {"id":"100", "balance":0}, "destination": {"id":"300", "balance":15}}

//Transfer from non-existing account
//POST /event {"type": "transfer", "origin":"200", "amount":15, "destination":300}
//404 0
Route::post('/event', '\App\Http\Controllers\EventController@store');
