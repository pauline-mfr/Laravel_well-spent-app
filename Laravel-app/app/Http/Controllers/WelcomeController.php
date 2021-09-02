<?php

namespace App\Http\Controllers;
use App\Models\Expense;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {

        $total_ex = Expense::sum('amount');
        return view('homepage', compact('total_ex'));
    }
}
