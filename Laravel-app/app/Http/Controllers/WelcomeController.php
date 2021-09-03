<?php

namespace App\Http\Controllers;
use App\Models\Expense;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {

        $total_in = Expense::where('is_income', 1)->sum('amount');
        $total_ex = Expense::sum('amount');
        $balance = $total_in - $total_ex;
        return view('homepage', compact('total_in', 'total_ex', 'balance'));
    }
}
