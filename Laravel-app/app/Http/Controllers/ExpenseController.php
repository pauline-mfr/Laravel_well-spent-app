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
    public function index()
    {
        // DISPLAY
        $line = 1;
        $expenses = Expense::all()->where('is_income', 0);

        

        //DATE_FORMAT(`date`, '%d-%m-%Y')
        //DB::raw('DATE_FORMAT(account.terminationdate,"%Y-%m-%d") as accountterminationdate')
          

        //TEST SELECT CAT
        /* $query = $chosen_cat ? Expense::where('category', $chosen_cat) : Expense::query();
        $expenses = $query->oldest('title')->paginate(100); */
        
        /* 
        $query = $slug ? Category::whereSlug($slug)->firstOrFail()->films() : Film::query();
    $films = $query->withTrashed()->oldest('title')->paginate(5);
    */

       
        $categories = Expense::select("category")
        ->groupBy("category")
        ->get();
        
        // TOTAL TAB
        $total_ex = Expense::where('is_income', 0)->sum('amount');
        
        //SUM CATEGORIES
        $sum_categories = Expense::select([
            'category',
            DB::raw('SUM(amount) AS total_cat') ])
            ->where('is_income', 0)
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
        } elseif($request->has('category')) {
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

    public function showCat($selected) {
        echo($selected);
    }
     //TEST SELECT CAT
        /* $query = $chosen_cat ? Expense::where('category', $chosen_cat) : Expense::query();
        $expenses = $query->oldest('title')->paginate(100); */
        
        /* 
        $query = $slug ? Category::whereSlug($slug)->firstOrFail()->films() : Film::query();
    $films = $query->withTrashed()->oldest('title')->paginate(5);
    */

    public function showMonth(Request $request)
    {
        $line = 1;

        $selected_month = $request->selected_month; //récup le mois sélectioné 
        $month_expenses = DB::table('expenses')
            ->where('is_income', 0)
            ->whereMonth('date', $selected_month)
            ->get();   
           
       
        
        return view('view-month', compact('line', 'month_expenses', 'selected_month'));
    }
}


