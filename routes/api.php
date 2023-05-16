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
// USER ROUTE
// Route::get('/user',[UserController::class, 'index']);
// Route::get('/user/{id}',[UserController::class, 'show']);
// Route::post('/user',[UserController::class, 'store']);
// Route::put('/user/{id}',[UserController::class, 'update']);
// Route::delete('/user/{id}',[UserController::class, 'destroy']);

Route::resource('/user',UserController::class);


// EVENT ROUTE
// Route::get('/event',[EventController::class, 'index']);
// Route::post('/event',[EventController::class, 'store']);
// Route::put('/event/{id}',[EventController::class, 'update']);
// Route::delete('/event/{id}',[EventController::class, 'destroy']);
Route::resource('/event',EventController::class);

// search
Route::get('/search',[EventController::class, 'search']);


// TEAM ROUTE
// Route::get('/team',[TeamController::class, 'index']);
// Route::post('/team',[TeamController::class, 'store']);
// Route::put('/team/{id}',[TeamController::class, 'update']);
// Route::delete('/team/{id}',[TeamController::class, 'destroy']);
Route::resource('/team',TeamController::class);


// // Ticket ROUTE
// Route::get('/ticket',[TicketController::class, 'index']);
// Route::post('/ticket',[TicketController::class, 'store']);
// Route::put('/ticket/{id}',[TicketController::class, 'update']);
// Route::delete('/ticket/{id}',[TicketController::class, 'destroy']);
Route::resource('/ticket',TicketController::class);

