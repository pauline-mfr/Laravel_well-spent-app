<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class UsersController extends Controller
{
    public function create()
    {
        return view('infos');
    }
 
    public function store(Request $request)
    {
        return 'Name is ' . $request->input('name');
    }
}