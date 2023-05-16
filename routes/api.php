<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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

// USER ROUTE============================================
Route::resource('/user',UserController::class);


// EVENT ROUTE============================================
Route::resource('/event',EventController::class);
// search
Route::get('/search',[EventController::class, 'search']);


// TEAM ROUTE============================================
Route::resource('/team',TeamController::class);


// // Ticket ROUTE============================================
Route::resource('/ticket',TicketController::class);

