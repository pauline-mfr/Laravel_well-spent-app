<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function create() {
         //appeler la vue du formulaire de création
         return view('contacts');
    }

    public function store(Request $request) {
        //valider la saisie
        $this->validate($request, [
            'email' => 'bail|required|email',
            'message' => 'bail|required|max:500'
        ]);

        //enregistrer code dans la base
        $contact = new \App\Models\Contacts; //crée nouvelle instance du modèle
        // renseigne les propriétés
        $contact->email = $request->email; 
        $contact->message = $request->message;
        $contact->save(); // enregistrement DB

        return 'Bien enregistré';
    }
}
