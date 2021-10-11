<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {

        $total_in = Expense::where('is_income', 1)->sum('amount');
        $total_ex = Expense::where('is_income', 0)->sum('amount');
        $balance = $total_in - $total_ex;

        //TEST DATE
        $months = Expense::select(            
            DB::raw('MONTH(date) AS month') )
            ->groupBy('month')
            ->get();
            

            //DISPLAY MONTH NAME
           


        return view('homepage', compact('total_in', 'total_ex', 'balance', 'months'));
    }
}
