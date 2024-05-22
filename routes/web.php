<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Inertia\Inertia;

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

    return Inertia::render("Home");

});

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::post('user/{id}', [UserController::class, 'update'])->name('user.update');
