<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/clients', 'App\Http\Controllers\ClientController@index');
Route::post('/clients', 'App\Http\Controllers\ClientController@store');
Route::get('/clients/{client}', 'App\Http\Controllers\ClientController@show');
Route::put('/clients/{client}', 'App\Http\Controllers\ClientController@update');
Route::delete('/clients/{client}', 'App\Http\Controllers\ClientController@destroy');


Route::get('/projects', 'App\Http\Controllers\ProjectController@index');
Route::post('/projects', 'App\Http\Controllers\ProjectController@store');
Route::get('/projects/{project}', 'App\Http\Controllers\ProjectController@show');
Route::put('/projects/{project}', 'App\Http\Controllers\ProjectController@update');
Route::delete('/projects/{project}', 'App\Http\Controllers\ProjectController@destroy');


Route::post('/clients/project', 'App\Http\Controllers\ClientController@attach');


Route::get('/tickets', 'App\Http\Controllers\TicketController@index');
Route::post('/tickets', 'App\Http\Controllers\TicketController@store');
Route::get('/tickets/{ticket}', 'App\Http\Controllers\TicketController@show');
Route::put('/tickets/{ticket}', 'App\Http\Controllers\TicketController@update');
Route::delete('/tickets/{ticket}', 'App\Http\Controllers\TicketController@destroy');