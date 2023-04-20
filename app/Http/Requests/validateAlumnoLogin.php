<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateAlumnoLogin extends FormRequest
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
            "correo"=>"required|email",
            "contraseña"=>"required|min:8",
        ];
    }
    public function messages()
    {
        return[
            "correo.required"=>"*El correo es requerido",
            "correo.email"=>"*Rectifica tu correo",
            "contraseña.required"=>"*La contraseña es requerida",
            "contraseña.min"=>"*La contraseña debe de tener mas de 8 caracteres"
        ];
    }
}