<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
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

Route::get('/greeting', function () {
    return 'Hello World';
});


Route::get("/apply", function () {
    return view('apply');
})->name('apply');

Route::get("/applicants", function () {
    return view('applicants');
});

Route::get('/products', [ProductsController::class, 'index'])->name('products');

// How do I get this to work? should be able to "name" a route... something other than the endpoint name
// Route::get('/products', [ProductsController::class, 'index'])->name('productsnameroute');

// Route::get('/user/{id}', [UserController::class, 'show']);

// works
// Route::get('/user/{id}', function (string $id) {
//     return 'User '.$id;
// });

// Route::get('/user/{id}', [UserController::class, 'show']);

// Route::get('/user/profile', function () {
//     // ...
// })->name('profile');

// $url = route('profile', ['id' => 1]);

Route::get('/users', [UserController::class, 'index'])->name('users');

Route::get('/applications', [ApplicationsController::class, 'index'])->name('applications');

Route::post('submitapplication', [ApplicationsController::class, 'submitapplication']);
