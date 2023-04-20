<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests\validateAdminsSingIn;
use App\Http\Requests\validateAdminsLogin;
use Illuminate\Contracts\Session\Session;

class controllerAdminsBD extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sesion(validateAdminsLogin $req)
    {
        $correo = $req->input('correo');
        $pass = $req->input('contraseña');

        $datosC = DB::table('tb_admins')->where('correo', $correo)->where('contraseña', $pass)->get();

        if(count($datosC) > 0){
            foreach($datosC as $datoC){
                session_start();

                $_SESSION['nombre'] = $datoC->nombre;

            }
            DB::table('tb_biblioteca_personal')->update([
                "Fecha_actual" => Carbon::now(),
            ]);
            return redirect('Inicio.Admin')->with('usuario', $correo);
        } else{
            return redirect('Login.Admins')->with('sesionNoIniciada', 'abc');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(validateAdminsSingIn $req)
    {
        $pass1 = $req->input('contraseña');
        $pass2 = $req->input('confirContra');
        $correo = $req->input('correo');
        $clave_id = $req->input('clave_id');

        $datos = DB::table('tb_admins')->where('correo', $correo)->get();

        $datosId = DB::table('tb_admins')->where('clave_id', $clave_id)->get();

        if($pass1 != $pass2){
            return redirect('SingIn.Admins')->with('malPass', 'abc');
        } elseif(count($datos) > 0){
            return redirect('SingIn.Admins')->with('correoExiste', 'abc');
        } elseif(count($datosId) > 0){
            return redirect('SingIn.Admins')->with('ClaveExiste', 'abc');
        } else {
            DB::table('tb_admins')->insert([
                "nombre" => $req->input('nombre'),
                "apellido" => $req->input('apellido'),
                "clave_id" => $req->input('clave_id'),
                "correo" => $req->input('correo'),
                "no_telefono" => $req->input('no_telefono'),
                "contraseña" => $req->input('contraseña'),
                "fecha_registro" => Carbon::now()
            ]);
            return redirect('Login.Admins')->with('guardado', 'abc');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($clave_id)
    {
        DB::table('tb_admins')->where('clave_id', $clave_id)->delete();


        return redirect()->route('admins.show')->with('alumnoEliminado', 'abc');
    }
}