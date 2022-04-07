<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ApplicationController::class, 'index']);
Route::get('/todo/create', [ApplicatonController::class, 'index']);
Route::post('/todo/create', [ApplicationController::class, 'create']);
Route::get('/todo/update', [ApplicationController::class, 'index'])->name('update');
Route::post('/todo/update', [ApplicationController::class, 'update'])->name('update');
Route::get('/todo/delete', [ApplicationController::class, 'index'])->name('delete');
Route::post('/todo/delete', [ApplicationController::class, 'delete'])->name('delete');