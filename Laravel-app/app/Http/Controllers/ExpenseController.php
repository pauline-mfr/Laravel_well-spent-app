<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // DISPLAY
        $line = 1;         
           
         if(empty($request->selected_cat) || $request->selected_cat == "all_cat") {
                
                // All categories display
                $expenses = Expense::where('is_income', 0)
                ->whereMonth('date', date('m')) //date('m') = current month
               ->whereYear('date', date('Y'))
                ->orderBy('date', 'asc')
                ->get(); 

                //total all categories
                $total_ex = Expense::where('is_income', 0)
                ->whereMonth('date', date('m'))
                ->whereYear('date', date('Y'))
                ->sum('amount');
            } else { 
        
                // one category display
                $expenses = Expense::where('is_income', 0)
                ->where('category', $request->selected_cat)
                ->whereMonth('date', date('m'))
               ->whereYear('date', date('Y'))
                ->orderBy('date', 'asc')
                ->get(); 
    
                //total chosen category
                $total_ex = Expense::where('is_income', 0)
                ->where('category', $request->selected_cat)
                ->whereMonth('date', date('m'))
                ->whereYear('date', date('Y'))
                ->sum('amount');
    
                }
           

       
        $categories = Expense::select("category")
        ->whereMonth('date', date('m'))
        ->whereYear('date', date('Y'))
        ->groupBy("category")
        ->get();
        
        // TOTAL TAB
        
        
        //SUM CATEGORIES
        $sum_categories = Expense::select([
            'category',
            DB::raw('SUM(amount) AS total_cat') ])
            ->where('is_income', 0)
            ->whereMonth('date', date('m')) 
            ->whereYear('date', date('Y'))
            ->groupBy('category')
            ->orderBy('total_cat', 'desc')
            ->get(); 

        foreach($sum_categories as $cat) {
            if($cat->category == NULL) {
                $cat->category = 'uncategorised';}
        }        
        
        return view('expenses', compact('expenses', 'line', 'total_ex', 'sum_categories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Expense::select("category")
        ->groupBy("category")
        ->get();
        return view('new-expense', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $expense = new \App\Models\Expense; //create new model instance
          // get properties
         $expense->date = $request->date; 
         $expense->title = $request->title; 
         $expense->amount = $request->amount; 
         if($request->has('new_category') && !empty($request->new_category)) {
            $expense->category = $request->new_category;
        } elseif($request->has('category') && $request->category == 'Select a category') {
            $expense->category = NULL;
        } else {
            $expense->category = $request->category;
        }
         $expense->save(); // DB register      

        //Expense::create($request->all()); (enregistre en une seule ligne mais pb category)

        
            return redirect()->route('expenses.index')->with('user-alert', 'New income added');
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //Used to show year category
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        return view('edit-expense', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $expense->update($request->all());

        return redirect()->route('expenses.index')->with('user-alert', 'Well modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return back()->with('user-alert', 'Expense deleted !');
    }

    public function showCat(Request $request) {


   
}


}