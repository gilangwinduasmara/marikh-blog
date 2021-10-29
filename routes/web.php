<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'registerUser']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginUser']);
Route::get('/logout', [UserController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard']);
    Route::get('/artikel', [ArticleController::class, 'index']);
    Route::get('/artikel/create', [ArticleController::class, 'create']);
    Route::post('/artikel/create', [ArticleController::class, 'store']);
    Route::get('/artikel/{id}', [ArticleController::class, 'show']);
});
