<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests\validateAlumnoLogin;
use App\Http\Requests\validateAlumnoSingIn;
use App\Http\Requests\validateAlumnoEdit;
use Illuminate\Contracts\Session\Session;

class controllerAlumnosBD extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sesion(validateAlumnoLogin $req)
    {
        $correo = $req->input('correo');
        $pass = $req->input('contraseña');

        $usuario = DB::table('tb_alumnos')->where('correo', $correo)->where('contraseña', $pass)->get();

        if(count($usuario) > 0){
            foreach($usuario as $usu){
                session_start();

                $_SESSION['matricula'] = $usu->Matricula;
                $_SESSION['nombre'] = $usu->nombre;
                $_SESSION['estado'] = $usu->estado;

            }
        // Actualizamos la fecha actual cuando se corrobora el usuario en todos los registros
        // de la biblioteca personal
        DB::table('tb_biblioteca_personal')->update([
            "Fecha_actual" => Carbon::now(),
        ]);
        $libros = DB::table('tb_biblioteca_personal')->get();
        foreach($libros as $libro){
            if($libro->Fecha_termino <= $libro->Fecha_actual){
                DB::table('tb_biblioteca_personal')->where('id_biblioPersonal', $libro->id_biblioPersonal)->update([
                    "status" => 'false',
                ]);
            }
        }
        $matricula = $_SESSION['matricula'];
        $entregas = DB::table('tb_biblioteca_personal')->where('status', 'false')->where('matricula', $matricula)->get();

        if(count($entregas) > 0){
            return redirect('Inicio.Usu')->with('EntregaYa', $correo);
        }

            return redirect('Inicio.Usu')->with('usuario', $correo);

        } else{
            return redirect('Login.Alumnos')->with('sesionNoIniciada', 'abc');
        }
    }

    public function settingsA($id)
    {
        $datosUs = DB::table('tb_alumnos')->where('matricula', $id)->first();

        return view('editSelectAlumno', compact('id', 'datosUs'));
    }

    public function settingsStoreA(Request $req, $matricula)
    {

        $estado = $req->input("estado");

        DB::table('tb_alumnos')->where('matricula', $matricula)->update([
            "estado" => $estado,
        ]);
        return redirect()->route('LogAlumnos', $matricula)->with('guardados', 'abc');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(validateAlumnoSingIn $req)
    {
        $contra1 = $req->input('contraseña');
        $contra2 = $req->input('confirContra');
        $matricula = $req->input('matricula');
        $correo = $req->input('correo');

        $datoC = DB::table('tb_alumnos')->where('correo', $correo)->get();

        $datoM = DB::table('tb_alumnos')->where('matricula', $matricula)->get();

        if(count($datoC) > 0){
            return redirect('SingIn.Alumnos')->with('correoExiste', 'abc');
        } elseif(count($datoM) > 0){
            return redirect('SingIn.Alumnos')->with('matriculaExiste', 'abc');
        } elseif($contra1 !== $contra2){
            return redirect('SingIn.Alumnos')->with('malPass', 'abc');
        } else{
            DB::table('tb_alumnos')->insert([
                "nombre" => $req->input('nombre'),
                "apellido" => $req->input('apellido'),
                "matricula" => $req->input('matricula'),
                "carrera" => $req->input('carrera'),
                "no_telefono" => $req->input('no_telefono'),
                "correo" => $req->input('correo'),
                "contraseña" => $req->input('contraseña'),
                "fecha_registro" => Carbon::now()
            ]);
            return redirect('Login.Alumnos')->with('guardado','abc');
        }
    }

    /**
     * Display the specified resource.
     */
    public function showAlumnos(Request $req)
    {
        $campo = $req->input('buscador-alumnos');

        $bibliotecas = DB::table('tb_biblioteca_personal')->get();
        $alumnoEsp = DB::table('tb_alumnos')->where('matricula', $campo)->orWhere('nombre', 'LIKE', "%{$campo}%")->orWhere('apellido','LIKE', "%{$campo}%")->get();
        if(count($alumnoEsp) > 0){
            $alumnos = $alumnoEsp;
            return view('consultaAlumnos', compact('alumnos', 'bibliotecas'));
        } else {
            $alumnos = $alumnoEsp;
            return view('consultaAlumnos', compact('alumnos', 'bibliotecas'));
        }
        $alumnos = DB::table('tb_alumnos')->get();
        return view('consultaAlumnos', compact('alumnos', 'bibliotecas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($matricula)
    {
        $alumno = DB::table('tb_alumnos')->where('matricula', $matricula)->first();
        return view('editarAlumno', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(validateAlumnoEdit $req, $matricula)
    {
        $matriculaInp = $req->input('matricula');
        $correo = $req->input('correo');

        $datoC = DB::table('tb_alumnos')->where('correo', $correo)->get();
        if($matricula != $matriculaInp){
            $datoM = DB::table('tb_alumnos')->where('matricula', $matriculaInp)->get();
            if(count($datoM) > 0){
                return redirect()->route('Alumno.edit', $matricula)->with('matriculaExiste', 'abc');
            }
        }
        if(count($datoC) > 0){
            foreach($datoC as $dato){
                if($dato->correo == $correo and $dato->Matricula == $matricula){
                    DB::table('tb_alumnos')->where('matricula', $matricula)->update([
                        "nombre" => $req->input('nombre'),
                        "apellido" => $req->input('apellido'),
                        "matricula" => $req->input('matricula'),
                        "carrera" => $req->input('carrera'),
                        "no_telefono" => $req->input('no_telefono'),
                        "correo" => $req->input('correo'),
                        "contraseña" => $req->input('contraseña'),
                    ]);
                    return redirect()->route('alumnos.show')->with('alumnoEditado', 'abc');
                }
            }
            return redirect()->route('Alumno.edit', $matricula)->with('correoExiste', 'abc');

        } else{

            DB::table('tb_alumnos')->where('matricula', $matricula)->update([
                "nombre" => $req->input('nombre'),
                "apellido" => $req->input('apellido'),
                "matricula" => $req->input('matricula'),
                "carrera" => $req->input('carrera'),
                "no_telefono" => $req->input('no_telefono'),
                "correo" => $req->input('correo'),
                "contraseña" => $req->input('contraseña'),
            ]);
            return redirect()->route('alumnos.show')->with('alumnoEditado', 'abc');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($matricula)
    {
        DB::table('tb_alumnos')->where('matricula', $matricula)->delete();
        DB::table('tb_biblioteca_personal')->where('matricula', $matricula)->delete();
        $personales = DB::table('tb_biblioteca_personal')->where('matricula', $matricula)->get();
        foreach($personales as $personal){
            $id_libro = $personal->id_libro;
            $disponibles = DB::table('tb_libros')->where('id_libro', $id_libro)->first();
            DB::table('tb_libros')->where('id_libro', $id_libro)->update([
                "disponibles" => $disponibles + 1,
            ]);
        }
        return redirect()->route('alumnos.show')->with('alumnoEliminado', 'abc');
    }
}