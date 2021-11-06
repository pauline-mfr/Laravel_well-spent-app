<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;

class MonthController extends Controller
{
    public function showMonth(Request $request)
    {
        $line = 1;  
        $short_date = $request->selected_month;
        $selected_month = date('m', strtotime($request->selected_month));  
        $selected_year = date('Y', strtotime($request->selected_month));   
       /*  $selected_month = date('m', strtotime($request->selected_month)); //récup le mois sélectioné (en chiffres) */
       
       
       // Display all 
       if(empty($request->selected_cat) || $request->selected_cat == "all_cat") { 
           
           $month_expenses = Expense::where('is_income', 0)
           ->whereMonth('date', $selected_month)
           ->whereYear('date', $selected_year)
           ->orderBy('date', 'asc')
           ->get();  
           
        } else {
            //display one cat in the expenses tab + display total
            
            $month_expenses = Expense::where('is_income', 0)
            ->where('category', $request->selected_cat)
            ->whereMonth('date', $selected_month)
            ->whereYear('date', $selected_year)
            ->orderBy('date', 'asc')
            ->get();  
            
        }
        
        $total_month_in = Expense::where('is_income', 1)->whereMonth('date', $selected_month)->whereYear('date', $selected_year)->sum('amount');
        $total_month_ex = Expense::where('is_income', 0)->whereMonth('date', $selected_month)->whereYear('date', $selected_year)->sum('amount');
        $month_balance = $total_month_in - $total_month_ex;
 
        $month_incomes = Expense::where('is_income', 1)
        ->whereMonth('date', $selected_month)
        ->whereYear('date', $selected_year)
        ->orderBy('date', 'asc')
        ->get();  
        
        
            
        $sum_month_categories = Expense::select([
                'category',
                DB::raw('SUM(amount) AS total_cat') ])
                ->where('is_income', 0)
                ->whereMonth('date', $selected_month)
                ->whereYear('date', $selected_year)
                ->groupBy('category')
                ->orderBy('total_cat', 'desc')
                ->get(); 
    
            foreach($sum_month_categories as $cat) {
                if($cat->category == NULL) {
                    $cat->category = 'uncategorised';}
            }    
            
            $categories = Expense::select("category")
            ->whereMonth('date', date('m'))
            ->whereYear('date', date('Y'))
            ->groupBy("category")
            ->get();
            

           
           
        
        return view('view-month', compact('line', 'month_expenses', 'month_incomes', 'selected_month', 'total_month_in', 'total_month_ex', 'month_balance', 'sum_month_categories', 'selected_year', 'short_date', 'categories'));
    }
}
