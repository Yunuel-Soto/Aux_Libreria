@extends('Layout.plantilla4')

@section('titulo_documento', 'Editar')

@section('contenido')

    @if (session()->has('correoExiste'))
        {!! '<script> Swal.fire("Error al registrarte", "Correo ya registrado", "error") </script>' !!}
    @endif

    @if (session()->has('matriculaExiste'))
        {!! '<script> Swal.fire("Error al registrarte", "Matricula ya registrada", "error") </script>' !!}
    @endif

    <div class="cont-form cont-login">
        <form method="POST" action="{{ route('alumno.update', $alumno->Matricula) }}" class="form-alumnos">
            @csrf
            @method('PUT')
            <h2 class="h1-reg">Editar Alumno</h2>
            <div class="div-nombre_apellido">

                <input type="text" value="{{ $alumno->nombre }}" class="input-alumno inputsdouble" name="nombre"
                    placeholder="Nombre">
                {{-- <p class="p-errors">{{ $errors->first('nombre') }}</p> --}}


                <input type="text" value="{{ $alumno->apellido }}" class="input-alumno" name="apellido"
                    placeholder="Apellido">
                {{-- <p class="p-errors">{{ $errors->first('apellido') }}</p> --}}

            </div>
            <div class="div-nombre_apellido">

                <input type="text" value="{{ $alumno->Matricula }}" class="input-alumno inputsdouble" name="matricula"
                    placeholder="Matricula">
                {{-- <p class="p-errors">{{ $errors->first('matricula') }}</p> --}}


                <input list="carreras" value="{{ $alumno->carrera }}" type="text" class="input-alumno" name="carrera"
                    placeholder="Carrera">
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

            </div>

            <input type="text" value="{{ $alumno->no_telefono }}" class="input-alumno rewidth" name="no_telefono"
                placeholder="No_telefono">
            <p class="p-errors">{{ $errors->first('no_telefono') }}</p>
            <input type="text" value="{{ $alumno->correo }}" class="input-alumno rewidth" name="correo"
                placeholder="Correo">
            <p class="p-errors">{{ $errors->first('correo') }}</p>
            <input type="text" value="{{ $alumno->contraseña }}" class="input-alumno rewidth" name="contraseña"
                placeholder="Contraseña">
            <p class="p-errors">{{ $errors->first('contraseña') }}</p>
            {{-- <input type="file" class="input-alumno rewidth file-input" name="confirContra" placeholder="Imagen"> --}}
            <div class="cont-btn">
                <button type="submit" class="btn-aceptar">Aceptar</button>
            </div>
        </form>
    </div>

@stop
