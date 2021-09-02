<?php

namespace App\Http\Controllers;
use App\Models\Expense;

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
        $line = 1;
        $expenses = Expense::all();
        $total_ex = Expense::sum('amount');
        $sum_categories = $expenses
        ->groupBy("category");
        
        return view('expenses', compact('expenses', 'line', 'total_ex', 'sum_categories'));
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

        return redirect()->route('expenses.index')->with('user-alert', 'New expense added');
        
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
}
