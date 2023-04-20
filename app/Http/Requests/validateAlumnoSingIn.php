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
            "confirContra" => "required|min:8"
        ];
    }
    public function messages()
    {
        return[
            "nombre.required"=>"*El campo es obligatorio",
            "apellido.required"=>"*El campo es obligatorio",
            "matricula.required"=>"*El campo es obligatorio",
            "carrera.required"=>"*El campo es obligatorio",
            "no_telefono.required"=>"*El campo es obligatorio",
            "correo.required"=>"*El campo es obligatorio",
            "contraseña.required"=>"*El campo es obligatorio",
            "nombre.string"=>"*Verifica tu nombre",
            "apellido.string"=>"*Verifica tu apellido",
            "matricula.numeric"=>"*Este campo solo acepta numeros",
            "matricula.min_digits"=>"*Solo se aceptan 9 digitos",
            "carrera.string"=>"*Verifica tu carrera",
            "no_telefono.numeric"=>"*Este campo solo acepta numeros",
            "no_telefono.min_digits"=>"*Solo se aceptan 10 digitos",
            "correo.email"=>"*Solo se acepta formato Email",
            "contraseña.required"=>"*Campo requerido",
            "contraseña.min" => "*Tiene que tener mas de 8 caracteres",
            "confirContra.required" => "*Campo requerido",
            "confirContra.min" => "*Tiene que tener mas de 8 caracteres",
        ];
    }
}