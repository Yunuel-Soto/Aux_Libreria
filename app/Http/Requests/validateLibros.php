<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateLibros extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'titulo' => 'required',
            'edicion' => 'required',
            'editorial' => 'required',
            'carrera' => 'required',
            'autor' => 'required',
            'tipo' => 'required',
            'cantidad' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => '*Campo requerido',
            'edicion.required' => '*Campo requerido',
            'editorial.required' => '*Campo requerido',
            'carrera.required' => '*Campo requerido',
            'autor.required' => '*Campo requerido',
            'tipo.required' => '*Campo requerido',
            'cantidad.required' => '*Campo requerido'
        ];
    }
}