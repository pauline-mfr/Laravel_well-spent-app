<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function showYear() {

       
        $total_year_in = Expense::where('is_income', 1)->sum('amount');        
        $total_year_ex = Expense::where('is_income', 0)->sum('amount');
        $year_balance = $total_year_in - $total_year_ex;

        //total cat

        $sum_year_categories = Expense::select([
            'category',
            DB::raw('SUM(amount) AS total_year_cat')
        ])
        ->where('is_income', 0)
        ->groupBy('category')
        ->orderBy('total_year_cat', 'desc')
        ->get();

        return view('view-year', compact('total_year_in', 'total_year_ex', 'year_balance', 'sum_year_categories'));

    }
}
