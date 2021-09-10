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

// Routes pour CRUD 
use App\Http\Controllers\ExpenseController;
Route::resource('expenses', ExpenseController::class);

use App\Http\Controllers\IncomeController;
Route::resource('incomes', IncomeController::class);