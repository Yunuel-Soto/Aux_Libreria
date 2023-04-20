<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateAdminsSingIn extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'clave_id' => 'required|min_digits:8',
            'nombre' => 'required',
            'apellido' => 'required',
            'no_telefono' => 'required|min_digits:10',
            'correo' => 'email|required',
            'contraseña' => 'required|min:8',
            'confirContra' => 'required|min:8'
        ];
    }
    public function messages()
    {
        return [
            'clave_id.required' => '*Campo requerido',
            'clave_id.min_digits' => '*La clave tiene que tener 8 numeros',
            'nombre.required' => '*Campo requerido',
            'apellido.required' => '*Campo requerido',
            'no_telefono.required' => '*Campo requerido',
            'no_telefono.min_digits' => '*Numero de telefono invalido',
            'correo.required' => '*Campo requerido',
            'correo.email' => '*Correo invalido',
            'contraseña.required' => '*Campo requerido',
            'contraseña.min' => '*La contraseña debe de tener mas de 8 caracteres',
            'confirContra.required' => '*Campo requerido',
            'confirContra.min' => '*La contraseña debe de tener mas de 8 caracteres'
        ];
    }
}