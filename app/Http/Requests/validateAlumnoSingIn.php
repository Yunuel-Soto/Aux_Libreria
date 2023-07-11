<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateAlumnoSingIn extends FormRequest
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
            "nombre"=>"required|string",
            "apellido"=>"required|string",
            "matricula"=>"required|numeric|min_digits:9",
            "carrera"=>"required|string",
            "no_telefono"=>"required|numeric|min_digits:10",
            "correo"=>"required|email",
            "contraseña"=>"required|min:8",
            "confirContra" => "required"
        ];
    }
    public function messages()
    {
        return[
            "nombre.required"=>"Nombre requerido",
            "apellido.required"=>"Apellido requerido",
            "matricula.required"=>"Campo requerido",
            "carrera.required"=>"Carrera requerida",
            "no_telefono.required"=>"Numero telefonico requerido",
            "correo.required"=>"Correo requerido",
            "contraseña.required"=>"Contraseña requerida",
            "nombre.string"=>"Los nombres no pueden tener campos numericos",
            "apellido.string"=>"Los apellidos no pueden tener campos numericos",
            "matricula.numeric"=>"La matricula no puede tener caracteres, solo numeros",
            "matricula.min_digits"=>"En la matricula solo se aceptan 9 digitos",
            "carrera.string"=>"Verifica tu carrera",
            "no_telefono.numeric"=>"El numero telefonico solo acepta numericos",
            "no_telefono.min_digits"=>"El numero solo aceptan 10 digitos",
            "correo.email"=>"Rectifica el correo",
            "contraseña.min" => "La contraseña tiene que tener mas de 8 caracteres",
            "confirContra.required" => "Confirma la contraseña",
        ];
    }
}