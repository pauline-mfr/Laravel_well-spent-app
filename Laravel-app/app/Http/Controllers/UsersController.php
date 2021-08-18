<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Http\Repositories\NameRepository;
 
class UsersController extends Controller
{
    public function create()
    {
        return view('infos');
    }
 
    public function store(Request $request, NameRepository $nameRepository)
    {   
        
        $nameRepository->getName();
        $nameRepository->shout();
        
    }
}