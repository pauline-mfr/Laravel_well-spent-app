<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //tableau qui contient les clés qui correspondent aux champs du formulaire - valeurs = règles de validation
        return [
            'nom' => 'bail|required|between:5,20|alpha',
            'email' => 'bail|required|email',
            'message' => 'bail|required|max:250'

            /* bail : on arrête de vérifier dès qu'une règle n'est pas respectée
            alpha : n'accepte que les caractères alphabétiques
            email : doit être une adresse email valide
             */
        ];
    }
}
