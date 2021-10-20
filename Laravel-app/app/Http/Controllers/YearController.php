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

        //Get the right verb
        if($year_balance>0) {
            $balance_verb = "saved";
        } else {
            $balance_verb = "lost";
        }

        //total cat
        $sum_year_categories = Expense::select([
            'category',
            DB::raw('SUM(amount) AS total_year_cat')
        ])
        ->where('is_income', 0)
        ->groupBy('category')
        ->orderBy('total_year_cat', 'desc')
        ->get();

        return view('view-year', compact('total_year_in', 'total_year_ex', 'year_balance', 'balance_verb', 'sum_year_categories'));

    }

    public function showYearCategory($category) {   
        $line = 1;
        $selected_category = Expense::all()->where('category', $category);
        $total_year_cat = Expense::all()->where('category', $category)->sum('amount');
        return view('view-cat', compact('category', 'line', 'selected_category', 'total_year_cat'));  
        
    }
}

