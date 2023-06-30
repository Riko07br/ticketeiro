<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Get all tickets
Route::get('/tickets', [TicketController::class, 'index']);

Route::post('/tickets/store', [TicketController::class, 'store']);

Route::get('/tickets/create', [TicketController::class, 'create']);

Route::get('/tickets/{ticket}', [TicketController::class, 'show']);

//Get all users
Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{user}', [UserController::class, 'show']);
