<?php

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

use App\Http\Controllers\WelcomeController;
// va chercher la class Welcome Controller et lance la fonction index()
Route::get('/', [WelcomeController::class, 'index']);

use App\Http\Controllers\AmountsController;
Route::get('/amounts', [AmountsController::class, 'display'])->name('amount.create');
Route::post('/amounts', [AmountsController::class, 'store'])->name('amount.store');


// TEST
use App\Http\Controllers\UsersController;
Route::get('/users', [UsersController::class, 'create']);
Route::post('/users', [UsersController::class, 'store']);

use App\Http\Controllers\ContactController;
Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store']);

use App\Http\Controllers\ContactsController;
Route::get('/contacts', [ContactsController::class, 'create'])->name('contacts.create'); 
Route::post('/contacts', [ContactsController::class, 'store'])->name('contacts.store'); 
/* Route::get('/', function () {
    return view('homepage');
});

Route::get('/template', function () {
    return view('template');
});

Route::get('/expenses', function () {
    return view('expenses');
}); */

// Routes pour CRUD Movies
use App\Http\Controllers\MoviesController;
Route::resource('movies', MoviesController::class);