<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
use Carbon\Carbon;


class WelcomeController extends Controller
{
    public function index() {

        $total_in = Expense::where('is_income', 1)->sum('amount');
        $total_ex = Expense::where('is_income', 0)->sum('amount');
        $balance = $total_in - $total_ex;

        //TEST DATE
        $recorded_months = Expense::selectRaw(            
            'year(date) as year, monthname(date) as month') 
            ->groupBy('year', 'month')
            ->orderBy('month', 'desc')
            ->get();
            
            /*
  $months = Expense::select(            
            DB::raw('MONTH(date) AS month') )
            ->groupBy('month')
            ->get();

*/
           
        return view('homepage', compact('total_in', 'total_ex', 'balance', 'recorded_months'));
    }
}
