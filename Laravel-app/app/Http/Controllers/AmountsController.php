<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmountsController extends Controller
{
    public function display() {
        return view('expenses');
    }

    public function store(Request $request) {
        //validate entry

        //DB adding
           $expense = new \App\Models\Amounts; //create new model instance
           // get properties
           $expense->date = $request->date; 
           $expense->title = $request->title; 
           $expense->amount = $request->amount; 
           $expense->save(); // DB register
   
           return 'New expense has been registered';
    }
}
