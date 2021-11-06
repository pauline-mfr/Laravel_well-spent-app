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
Route::get('/', [WelcomeController::class, 'index'])->name('homepage');

// Routes pour CRUD 
use App\Http\Controllers\ExpenseController;
Route::resource('expenses', ExpenseController::class);

use App\Http\Controllers\IncomeController;
Route::resource('incomes', IncomeController::class);

// ROUTE VIEW MONTH
use App\Http\Controllers\MonthController;
Route::get('view-month', [MonthController::class, 'showMonth'])->name('expenses.month');

// ROUTE VIEW YEAR
use App\Http\Controllers\YearController;
Route::get('view-year', [YearController::class, 'showYear'])->name('expenses.year');
// ROUTE VIEW CAT YEAR
Route::get('expenses/year/{category}', [YearController::class, 'showYearCategory'])->name('year.cat');  

