@extends('Layout.plantilla3')

@section('titulo_documento', 'Login')

@section('contenido')

    @if (session()->has('sesionNoIniciada'))
        {!! '<script> Swal.fire("Error al iniciar sesion", "La contraseña o correo son incorrectos", "error") </script>' !!}
    @endif

    <div class="cont-form cont-login">
        <form method="POST" action="{{ route('Log') }}" class="form-alumnos">
            @csrf
            <h2 class="h1-reg">Alumno</h2>
            <input type="text" class="input-alumno rewidth" name="correo" value="{{ old('correo') }}" placeholder="Correo">
            <p class="p-errors">{{ $errors->first('correo') }}</p>
            <input type="password" class="input-alumno rewidth" name="contraseña" value="{{ old('contraseña') }}"
                placeholder="Contraseña">
            <p class="p-errors">{{ $errors->first('contraseña') }}</p>
            <div class="cont-btn">
                <button type="submit" class="btn-aceptar">Aceptar</button>
            </div>
        </form>
    </div>

@stop
