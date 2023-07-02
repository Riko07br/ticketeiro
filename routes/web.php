<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LabelController;
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

Route::resource('categories', CategoryController::class)->only('index', 'create', 'store');
Route::resource('labels', LabelController::class)->only('index', 'create', 'store');
Route::resource('tickets', TicketController::class)->only('index', 'create', 'store', 'show');
Route::resource('users', UserController::class)->only('index', 'show');
