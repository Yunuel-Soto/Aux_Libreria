<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewController extends Controller
{
    public function viewInicio(){

        return view('inicio');
    }
    public function viewOpen(){
        return view('open');
    }
    public function viewLoginAlumnos(){
        return view('LoginAlumnos');
    }
    public function viewSingInAlumnos(){
        return view('SingInAlumnos');
    }
    public function viewInicioAdmin(){
        return view('inicioAdmin');
    }
    public function viewAddLibros(){
        return view('registroLibros');
    }
    public function viewSingInAdmins(){
        return view('SingInAdmins');
    }
    public function viewLoginAdmins(){
        return view('LoginAdmins');
    }
}
