<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationsController;

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

Route::get("/apply", function () {
    return view('apply');
})->name('apply');

Route::get('/applications', [ApplicationsController::class, 'index'])->name('applications');

Route::post('submitapplication', [ApplicationsController::class, 'submitapplication']);
