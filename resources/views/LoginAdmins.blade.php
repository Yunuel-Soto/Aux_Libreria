@extends('Layout.plantilla3')

@section('titulo_documento', 'Login')

@section('contenido')
    @if (session()->has('sesionNoIniciada'))
        {!! '<script> Swal.fire("Error al iniciar sesion", "La contraseña o correo son incorrectos", "error") </script>' !!}
    @endif
    @if (session()->has('guardados'))
        {!! '<script> Swal.fire("Datos actualizados", "Inicia sesion nuevamente para revalidarlos", "success") </script>' !!}
    @endif

    @if ($errors->first('contraseña') || $errors->first('correo'))
        <div class="alerta-errs">
            <p>
                @if ($errors->first('contraseña'))
                    <img src="./img/signo-de-exclamacion1.png" class="imgane"> {{ $errors->first('contraseña') }}
                @endif
                <img src="./img/cerrar.png" class="imagen2" id="close">
            </p>
            <p>
                @if ($errors->first('correo'))
                    <img src="./img/signo-de-exclamacion1.png" class="imgane"> {{ $errors->first('correo') }}
                @endif
            </p>
        </div>
    @endif

    <div class="cont-form cont-login">
        <form method="POST" action="{{ route('Admin.sesion') }}" class="form-alumnos">
            @csrf
            <h2 class="h1-reg">Administrador</h2>
            <input type="text" class="input-alumno rewidth" name="correo" value="{{ old('correo') }}"
                placeholder="Correo">
            {{-- <p class="p-errors">{{ $errors->first('correo') }}</p> --}}
            <input type="password" class="input-alumno rewidth" name="contraseña" value="{{ old('contraseña') }}"
                placeholder="Contraseña">
            {{-- <p class="p-errors">{{ $errors->first('contraseña') }}</p> --}}
            <div class="cont-btn">
                <button type="submit" class="btn-aceptar">Aceptar</button>
            </div>
        </form>
    </div>


@stop
