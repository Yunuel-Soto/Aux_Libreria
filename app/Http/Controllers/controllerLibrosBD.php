<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\validateLibros;
use DB;
use Carbon\Carbon;

class controllerLibrosBD extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req, $busqueda)
    {
        $search = $req->input('search');
        if($search != ''){
            $busqueda = $search;
            $consulta = DB::table('tb_libros')->where('titulo', 'LIKE', "%{$busqueda}%")->get();
            if(count($consulta)==0){
                $consulta = DB::table('tb_libros')->where('tipo', 'LIKE', "%{$busqueda}%")->get();
                if(count($consulta)>0){
                    return view('consultaBibliotecaAdmin', compact('consulta', 'busqueda'));
                } else {
                    //manda la busqueda no encontrada para que no aparezca ningun libro
                    return view('consultaBibliotecaAdmin', compact('consulta', 'busqueda'));
                }
            } else {
                return view('consultaBibliotecaAdmin', compact('consulta', 'busqueda'));
            }
        } else {
            if($busqueda != 'todos'){
                $consulta = DB::table('tb_libros')->where('carrera', $busqueda)->get();
                return view('consultaBibliotecaAdmin', compact('consulta', 'busqueda'));
            } else {
                //En el caso de que recien entres a la biblioteca o selecciones todos en el menu
                $consulta =DB::table('tb_libros')->get();
                return view('consultaBibliotecaAdmin', compact('consulta', 'busqueda'));
            }
        }
    }
    public function indexAlumno(Request $req, $matricula, $busqueda)
    {
        $search = $req->input('search');
        if($search != ''){
            $busqueda = $search;
            $consulta = DB::table('tb_libros')->where('titulo', 'LIKE', "%{$busqueda}%")->get();
            if(count($consulta)==0){
                $consulta = DB::table('tb_libros')->where('tipo', 'LIKE', "%{$busqueda}%")->get();
                if(count($consulta)>0){
                    return view('consultaBibliotecaAlumno', compact('consulta', 'matricula', 'busqueda'));
                } else {
                    //manda la busqueda no encontrada para que no aparezca ningun libro
                    return view('consultaBibliotecaAlumno', compact('consulta', 'matricula', 'busqueda'));
                }
            } else {
                return view('consultaBibliotecaAlumno', compact('consulta', 'matricula', 'busqueda'));
            }
        } else {
            if($busqueda != 'todos'){
                $consulta = DB::table('tb_libros')->where('carrera', $busqueda)->get();
                return view('consultaBibliotecaAlumno', compact('consulta', 'matricula', 'busqueda'));
            } else {
                //En el caso de que recien entres a la biblioteca o selecciones todos en el menu
                $consulta =DB::table('tb_libros')->get();
                return view('consultaBibliotecaAlumno', compact('consulta', 'matricula', 'busqueda'));
            }
        }
        //Solo falta agregar los parametros de la ruta a agregar
    }

    // Ideas para las filtraciones
    // Idea 1:Hacer funciones para filtrar y que lleven a la misma vista,
    // peroOlvidalo esa idea llevaria mucha repeticion de codigo

    // Idea 2: pasar por parametro lo que se busca, pero se tendra que
    // enviar hasta en del modal agregar y cada que se haga referencia
    // a la ruta library.alumno y library.admin

    /**
     * Show the form for creating a new resource.
     */
    public function masInfoAdmin($id)
    {
        $libro = DB::table('tb_libros')->where('id_libro', $id)->first();
        return view('masInformacionLibrosAdmins', compact('libro'));
    }

    public function masInfo($id)
    {
        $libro = DB::table('tb_libros')->where('id_libro', $id)->first();
        return view('masInformacionLibrosAlumno', compact('libro'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(validateLibros $req)
    {
        $titulo = $req->input('titulo');
        $edicion = $req->input('edicion');

        $books = DB::table('tb_libros')->where('titulo', $titulo)->where('edicion', $edicion)->get();

        if(count($books) > 0){
            return redirect('Libros.Agregar')->with('noGuardado', 'abc');
        } else{
            DB::table('tb_libros')->insert([
                "titulo" =>$req->input('titulo'),
                "edicion" =>$req->input('edicion'),
                "editorial" =>$req->input('editorial'),
                "carrera" =>$req->input('carrera'),
                "autor" =>$req->input('autor'),
                "tipo" =>$req->input('tipo'),
                "cantidad" =>$req->input('cantidad'),
                "disponibles" => $req->input('cantidad'),
                "imagen" =>$req->input('imagen'),
                "fecha_registro" =>Carbon::now()
            ]);
            return redirect('Libros.Agregar')->with('guardado', 'abc');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $busqueda)
    {
        $libro = DB::table('tb_libros')->where('id_libro', $id)->first();
        return view('editarLibros', compact('libro', 'busqueda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(validateLibros $req, $id, $busqueda)
    {
        $books = DB::table('tb_libros')->where('id_libro', $id)->first();

        $cantidadActual = $books->cantidad;

        $nueva = $req->input('cantidad');

        $disponibles = $books->disponibles;

        if($cantidadActual == $nueva){
            DB::table('tb_libros')->where('id_libro', $id)->update([
                "titulo" =>$req->input('titulo'),
                "edicion" =>$req->input('edicion'),
                "editorial" =>$req->input('editorial'),
                "carrera" =>$req->input('carrera'),
                "autor" =>$req->input('autor'),
                "tipo" =>$req->input('tipo'),
                "cantidad" =>$req->input('cantidad'),
                "imagen" =>$req->input('imagen'),
            ]);
        } elseif($cantidadActual < $nueva){
            $diferencia = $nueva - $cantidadActual;
            DB::table('tb_libros')->where('id_libro', $id)->update([
                "titulo" =>$req->input('titulo'),
                "edicion" =>$req->input('edicion'),
                "editorial" =>$req->input('editorial'),
                "carrera" =>$req->input('carrera'),
                "autor" =>$req->input('autor'),
                "tipo" =>$req->input('tipo'),
                "cantidad" =>$req->input('cantidad'),
                "disponibles" => $disponibles + $diferencia,
                "imagen" =>$req->input('imagen'),
            ]);
        } elseif ($cantidadActual > $nueva){
            $diferencia = $cantidadActual - $nueva;
            DB::table('tb_libros')->where('id_libro', $id)->update([
                "titulo" =>$req->input('titulo'),
                "edicion" =>$req->input('edicion'),
                "editorial" =>$req->input('editorial'),
                "carrera" =>$req->input('carrera'),
                "autor" =>$req->input('autor'),
                "tipo" =>$req->input('tipo'),
                "cantidad" =>$req->input('cantidad'),
                "disponibles" => $disponibles + $diferencia,
                "imagen" =>$req->input('imagen'),
            ]);
        }
        // return redirect('Biblioteca.Admin')->with('succesAdmin', 'abc');
        return redirect()->route('library', $busqueda)->with('succesAdmin', 'abc');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $busqueda)
    {
        DB::table('tb_libros')->where('id_libro', $id)->delete();
        // return redirect('Biblioteca.Admin')->with('deleteLibro', 'abc');
        return redirect()->route('library', $busqueda)->with('deleteLibro', 'abc');
    }
}
