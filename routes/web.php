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

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('admin')->group(function () {
    Route::resource('categories', CategoryController::class)->only('index', 'create', 'store', 'edit', 'update');
    Route::resource('labels', LabelController::class)->only('index', 'create', 'store', 'edit', 'update');
    Route::resource('users', UserController::class)->only('index', 'show', 'edit', 'update');
});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('tickets', TicketController::class);
});

Route::prefix('agent')->middleware('agent')->group(function () {
    Route::resource('tickets', TicketController::class)->only('index', 'edit', 'update', 'show');
});

Route::prefix('user')->middleware('user')->group(function () {
    Route::resource('tickets', TicketController::class)->only('index', 'create', 'store', 'show', 'destroy');
});
