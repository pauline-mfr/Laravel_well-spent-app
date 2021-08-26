<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Movies extends FormRequest
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
        return [
            'tilte' => ['required', 'string', 'max:100'],
            'year' => ['required', 'numeric', 'min:1950','max:'.date('Y')],
            'description' => ['required', 'string', 'max:500'],
        ];
    }
}
