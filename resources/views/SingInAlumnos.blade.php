@extends('Layout.plantilla3')

@section('titulo_documento', 'SignIn')

@section('contenido')
    @if (session()->has('malPass'))
        {!! '<script> Swal.fire("Error al registrarte", "Las contraseñas no coinciden ", "error") </script>' !!}
    @endif

    @if (session()->has('correoExiste'))
        {!! '<script> Swal.fire("Error al registrarte", "Correo ya registrado", "error") </script>' !!}
    @endif

    @if (session()->has('matriculaExiste'))
        {!! '<script> Swal.fire("Error al registrarte", "Matricula ya registrada", "error") </script>' !!}
    @endif

    <div class="cont-form">
        <form method="POST" action="{{ route('Alumno.store') }}" class="form-alumnos">
            @csrf
            <h2 class="h1-reg">Registrate</h2>
            <div class="div-nombre_apellido">
                <div>
                    <input type="text" value="{{ old('nombre') }}" class="input-alumno inputsdouble" name="nombre"
                        placeholder="Nombre">
                    <p class="p-errors">{{ $errors->first('nombre') }}</p>
                </div>
                <div>
                    <input type="text" value="{{ old('apellido') }}" class="input-alumno" name="apellido"
                        placeholder="Apellido">
                    <p class="p-errors">{{ $errors->first('apellido') }}</p>
                </div>
            </div>
            <div class="div-nombre_apellido">
                <div>
                    <input type="text" value="{{ old('matricula') }}" class="input-alumno inputsdouble" name="matricula"
                        placeholder="Matricula">
                    <p class="p-errors">{{ $errors->first('matricula') }}</p>
                </div>
                <div>
                    <input list="carreras" value="{{ old('carrera') }}" type="text" class="input-alumno" name="carrera"
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
                    <p class="p-errors">{{ $errors->first('carrera') }}</p>
                </div>
            </div>

            <input type="text" value="{{ old('no_telefono') }}" class="input-alumno rewidth" name="no_telefono"
                placeholder="No_telefono">
            <p class="p-errors">{{ $errors->first('no_telefono') }}</p>
            <input type="text" value="{{ old('correo') }}" class="input-alumno rewidth" name="correo"
                placeholder="Correo">
            <p class="p-errors">{{ $errors->first('correo') }}</p>
            <input type="password" value="{{ old('contraseña') }}" class="input-alumno rewidth" name="contraseña"
                placeholder="Contraseña">
            <p class="p-errors">{{ $errors->first('contraseña') }}</p>
            <input type="password" value="{{ old('confirContra') }}" class="input-alumno rewidth" name="confirContra"
                placeholder="Confirma Contraseña">
            <p class="p-errors">{{ $errors->first('confirContra') }}</p>
            {{-- <input type="file" class="input-alumno rewidth file-input" name="confirContra" placeholder="Imagen"> --}}
            <div class="cont-btn">
                <button type="submit" class="btn-aceptar">Aceptar</button>
            </div>
        </form>
    </div>

@stop
