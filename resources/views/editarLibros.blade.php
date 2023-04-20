@extends('Layout.plantilla4')

@section('titulo_documento', 'Editar Libro')

@section('contenido')

    <div class="cont-form cont-login cont-form-libros">
        <form method="POST" action="{{ route('libros.update', [$libro->id_libro, $busqueda]) }}"
            class="form-alumnos form-libros">
            @method('PUT')
            @csrf
            <h2 class="h1-reg">Editar Libro</h2>
            <input type="text" value="{{ $libro->titulo }}" class="input-alumno rewidth" name="titulo" placeholder="Titulo">
            <p class="p-errors">{{ $errors->first('titulo') }}</p>
            <div class="div-nombre_apellido">
                <div>
                    <input type="text" value="{{ $libro->edicion }}" class="input-alumno inputsdouble" name="edicion"
                        placeholder="Edicion">
                    <p class="p-errors">{{ $errors->first('edicion') }}</p>
                </div>
                <div>
                    <input type="text" value="{{ $libro->editorial }}" class="input-alumno" name="editorial"
                        placeholder="Editorial">
                    <p class="p-errors">{{ $errors->first('editorial') }}</p>
                </div>
            </div>
            <div class="div-nombre_apellido">
                <div>
                    <input list="carreras" type="text" value="{{ $libro->carrera }}" class="input-alumno inputsdouble"
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
                    <p class="p-errors">{{ $errors->first('carrera') }}</p>
                </div>
                <div>
                    <input type="text" value="{{ $libro->autor }}" class="input-alumno " name="autor"
                        placeholder="Autor">
                    <p class="p-errors">{{ $errors->first('autor') }}</p>
                </div>
            </div>
            <div class="div-nombre_apellido">
                <div>
                    <input type="text" value="{{ $libro->tipo }}" class="input-alumno inputsdouble" name="tipo"
                        placeholder="Tipo">
                    <p class="p-errors">{{ $errors->first('tipo') }}</p>
                </div>
                <div>
                    <input type="number" value="{{ $libro->cantidad }}" class="input-alumno" name="cantidad"
                        placeholder="Cantidad">
                    <p class="p-errors">{{ $errors->first('cantidad') }}</p>
                </div>
            </div>
            <input type="file" value="/img/portadas/{{ $libro->imagen }}" class="input-alumno rewidth file-input"
                name="imagen" placeholder="Inserte imagen">
            <div class="cont-btn">
                <button type="submit" class="btn-aceptar">Guardar</button>
            </div>
        </form>
    </div>

@stop
