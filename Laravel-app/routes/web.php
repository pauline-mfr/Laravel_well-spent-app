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

use App\Http\Controllers\ExpensesController;
Route::get('/expenses', [ExpensesController::class, 'display']);

use App\Http\Controllers\UsersController;
Route::get('/users', [UsersController::class, 'create']);
Route::post('/users', [UsersController::class, 'store']);

use App\Http\Controllers\ContactController;
Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store']);
/* Route::get('/', function () {
    return view('homepage');
});

Route::get('/template', function () {
    return view('template');
});

Route::get('/expenses', function () {
    return view('expenses');
}); */

