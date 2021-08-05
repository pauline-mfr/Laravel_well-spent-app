<?php
 
namespace App\Http\Controllers;

// on utilise le ContactRequest ici!
use App\Http\Requests\ContactRequest;
 
class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }
 
    public function store(ContactRequest $request)
    {
        return view('confirm');
    }
}

/* méthode pour la validation directement dans le controller sans utiliser le Request form 

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'bail|required|between:5,20|alpha',
            'email' => 'bail|required|email',
            'message' => 'bail|required|max:250'
        ]);
 
        return view('confirm');
    }
}