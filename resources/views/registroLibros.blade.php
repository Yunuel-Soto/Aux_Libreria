@extends('Layout.plantilla4')

@section('titulo_contenido', 'Agregar Libros')

@section('contenido')

    @if (session()->has('guardado'))
        {!! '<script> Swal.fire("Buen trabajo", "Libro Guardado", "success") </script>' !!}
    @endif

    @if (session()->has('noGuardado'))
        {!! '<script> Swal.fire("Error al guardar Libro", "Este libro ya esta registrado", "error") </script>' !!}
    @endif

    <div id="form-libros" class="cont-form cont-login cont-form-libros">
        <form method="POST" action="{{ route('libros.store') }}" class="form-alumnos form-libros">
            @csrf
            <h2 class="h1-reg">Libros</h2>
            <input type="text" value="{{ old('titulo') }}" class="input-alumno " name="titulo" placeholder="Titulo">
            <p class="p-errors">{{ $errors->first('titulo') }}</p>
            <div class="div-nombre_apellido">

                <input type="text" value="{{ old('edicion') }}" class="input-alumno inputsdouble" name="edicion"
                    placeholder="Edicion">
                {{-- <p class="p-errors">{{ $errors->first('edicion') }}</p> --}}


                <input type="text" value="{{ old('editorial') }}" class="input-alumno" name="editorial"
                    placeholder="Editorial">
                <p class="p-errors">{{ $errors->first('editorial') }}</p>

            </div>
            <div class="div-nombre_apellido">

                <input list="carreras" type="text" value="{{ old('carrera') }}" class="input-alumno inputsdouble"
                    name="carrera" placeholder="Carrera">
                <datalist id="carreras" class="list">
                    <option value="Ingenieria Mecatronica"></option>
                    <option value="Ingenieria en Sistemas Computacionales"></option>
                    <option value="Ingenieria en Tecnologia Automotriz"></option>
                    <option value="Ingenieria en Tecnologia en Manufactura"></option>
                    <option value="Ingenieria en Redes y Telecomunicaciones"></option>
                    <option value="Licenciatura en Administracion y Gestion de Empresas"></option>
                    <option value="Licenciatura en Negocios Internacionales"></option>
                </datalist>
                {{-- <p class="p-errors">{{ $errors->first('carrera') }}</p> --}}


                <input type="text" value="{{ old('autor') }}" class="input-alumno " name="autor" placeholder="Autor">
                <p class="p-errors">{{ $errors->first('autor') }}</p>

            </div>
            <div class="div-nombre_apellido">

                <input type="text" value="{{ old('tipo') }}" class="input-alumno inputsdouble" name="tipo"
                    placeholder="Descripcion">
                {{-- <p class="p-errors">{{ $errors->first('tipo') }}</p> --}}


                <input type="number" value="{{ old('cantidad') }}" class="input-alumno" name="cantidad"
                    placeholder="Cantidad">
                {{-- <p class="p-errors">{{ $errors->first('cantidad') }}</p> --}}

            </div>
            <input type="file" value="{{ old('imagen') }}" class="input-alumno  file-input" name="imagen"
                placeholder="Inserte imagen">
            <div class="cont-btn">
                <button type="submit" class="btn-aceptar">Guardar</button>
            </div>
        </form>
    </div>

@stop
