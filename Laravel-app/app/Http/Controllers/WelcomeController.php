<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
use Carbon\Carbon;


class WelcomeController extends Controller
{
    public function index() {

        $total_in = Expense::where('is_income', 1)
        ->whereMonth('date', date('m')) //date('m') = current month
        ->whereYear('date', date('Y'))
        ->sum('amount'); 
    
        $total_ex = Expense::where('is_income', 0)
        ->whereMonth('date', date('m')) //date('m') = current month
        ->whereYear('date', date('Y')) //date('Y') = current year
        ->sum('amount');
        $balance = $total_in - $total_ex;

        //SELECT 
        $recorded_months = Expense::selectRaw("date_format (`date`, '%M %y') as `short_date`, year(date) as year, month(date) as month")        
        ->groupBy('year', 'month', 'short_date')
        ->orderBy('year', 'desc')->orderBy('month', 'desc')        
        ->get();

    

           /*  'year(date) as year, month(date) as month') 
            ->groupBy('year', 'month')
           ->orderBy('year', 'desc')->orderBy('month', 'desc')
            //get the most recent (not alphabetic)
            ->get(); */
            
            
  /*$months = Expense::select(            
            DB::raw('MONTH(date) AS month') )
            ->groupBy('month')
            ->get();

*/
           
        return view('homepage', compact('total_in', 'total_ex', 'balance', 'recorded_months'));
    }
}
