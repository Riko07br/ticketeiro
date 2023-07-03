<?php

use App\Http\Controllers\AuthController;
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


Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'authenticate']);
Route::post('/auth/logout', [AuthController::class, 'logout']);

Route::middleware('admin')->group(function () {
    Route::resource('categories', CategoryController::class)->only('index', 'create', 'store');
    Route::resource('labels', LabelController::class)->only('index', 'create', 'store');
    Route::resource('tickets', TicketController::class)->only('index', 'create', 'store', 'show');
    Route::resource('users', UserController::class)->only('index', 'show');
});

Route::middleware('agent')->group(function () {
    Route::resource('tickets', TicketController::class)->only('index', 'store', 'show');
});

Route::middleware('user')->group(function () {
    Route::resource('tickets', TicketController::class)->only('index', 'create', 'store', 'show');
});
