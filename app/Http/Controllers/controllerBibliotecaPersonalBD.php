<?php

namespace App\Http\Controllers;

use App\Http\Requests\validateBiblioteca_personal;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;


class controllerBibliotecaPersonalBD extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($matricula)
    {
        $myBooks = DB::table('tb_biblioteca_personal')->where('matricula', $matricula)->get();
        if(count($myBooks) == 0){
            return redirect()->route('library.alumno', [$matricula, 'todos'])->with('Notienes', 'abc');
        }

        foreach($myBooks as $mybooks){
            $idBooks = $mybooks->id_libro;
            $dates[] = DB::table('tb_biblioteca_personal')->where('matricula', $matricula)->where('id_libro', $idBooks)->first();

            $books[] = DB::table('tb_libros')->where('id_libro', $idBooks)->first();
        }
        foreach($dates as $date){
            $fechaE = date_create($date->Fecha_actual);
            $fechaT = date_create($date->Fecha_termino);
            if($fechaE > $fechaT){
                $restante[] = date_diff($fechaT, $fechaE)->format('-%a');
            } else {
                $restante[] = date_diff($fechaT, $fechaE)->format('%a');
            }
        }
        $i = 0;
        return view('consultaBibliotecaPersonal', compact('books', 'dates', 'restante', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showLibrosAlumno($matricula)
    {
        $i = 0;
        $bibliosPersonal = DB::table('tb_biblioteca_personal')->where('matricula', $matricula)->get();
        $alumno = DB::table('tb_alumnos')->where('matricula', $matricula)->first();
        if(count($bibliosPersonal)> 0){
            foreach($bibliosPersonal as $libroAlumno){
                $id_libro = $libroAlumno->id_libro;
                $libros[] = DB::table('tb_libros')->where('id_libro', $id_libro)->first();
                $fechaE = date_create($libroAlumno->Fecha_actual);
                $fechaT = date_create($libroAlumno->Fecha_termino);
                if($fechaE > $fechaT){
                    $restante[] = date_diff($fechaT, $fechaE)->format('-%a');
                } else {
                    $restante[] = date_diff($fechaT, $fechaE)->format('%a');
                }
            }
        } else {
            $libros[] = "";
            $restante[] = "";
        }
        return view('consultaLibrosAlumno', compact('libros', 'bibliosPersonal', 'restante', 'i', 'alumno'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req, $idlibro, $matricula, $busqueda)
    {
        //Para los condicionales
        $books = DB::table('tb_libros')->where('id_libro', $idlibro)->get();
        $personales = DB::table('tb_biblioteca_personal')->where('id_libro', $idlibro)->where('matricula', $matricula)->get();
        $librosPerson = DB::table('tb_biblioteca_personal')->where('matricula', $matricula)->get();

        //Para extraer los datos del libro encontrado sin tener que iterar
        $book = DB::table('tb_libros')->where('id_libro', $idlibro)->first();

        $dateIni = Carbon::now();
        $dateT = $req->input('fecha_termino');

        if($dateT == ''){
            return redirect()->route('library.alumno', [$matricula, $busqueda])->with('CampoVacio', 'abc');
        } elseif($book->disponibles == 0){ //Para verificar si hay disponibles de un libro solicitado
            return redirect()->route('library.alumno', [$matricula, $busqueda])->with('NoGuardado', 'abc');
        } elseif (count($books) == 0){ //Para verificar que el libro existe
            return redirect()->route('library.alumno', [$matricula, $busqueda])->with('NoEncontrado', 'abc');
        } elseif(count($personales) > 0){ //Para verificar que no pidas mas de dos veces el mismo libro
            return redirect()->route('library.alumno', [$matricula, $busqueda])->with('No2Veces', 'abc');
        } elseif(count($librosPerson) > 2){ //El alumno solo puede pedir tres libros
            return redirect()->route('library.alumno', [$matricula, $busqueda])->with('ExedisteLibros', 'abc');
        } elseif($dateIni > $dateT){
            return redirect()->route('library.alumno', [$matricula, $busqueda])->with('FechaT_mayor_FechaIni', 'abc');
        }

        //Una veces que se cumplen todas las condiciones, guarda en la biblioteca personal
        //Y actualiza el numero de disponibles

        DB::table('tb_biblioteca_personal')->insert([
            "matricula" => $matricula,
            "id_libro" => $idlibro,
            "status" => 'True',
            "Fecha_expedicion" => Carbon::now(),
            "Fecha_termino" => $req->input('fecha_termino'),
            "Fecha_actual" => Carbon::now(),
        ]);

        $disponilesA = $book->disponibles - 1;

        DB::table('tb_libros')->where('id_libro', $idlibro)->update([
            "disponibles" => $disponilesA,
        ]);

        return redirect()->route('library.alumno', [$matricula, $busqueda])->with('libroAgregado', 'abc');
    }

    /**
     * Display the specified resource.
     */
    public function entrega($matricula, $id_libro)
    {
        DB::table('tb_biblioteca_personal')->where('matricula', $matricula)->where('id_libro', $id_libro)->delete();
        $libro = DB::table('tb_libros')->where('id_libro', $id_libro)->first();
        DB::table('tb_libros')->where('id_libro', $id_libro)->update([
            "disponibles" => $libro->disponibles + 1,
        ]);
        return redirect()->route('shAlumno', $matricula)->with('libroEntregado', 'abc');
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
    public function destroy(string $id)
    {
        //
    }
}