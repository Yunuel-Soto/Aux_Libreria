@extends('Layout.plantilla3')

@section('titulo_documento', 'SingIn')

@section('contenido')

    @if (session()->has('malPass'))
        {!! '<script> Swal.fire("Error al registrarte", "Las contraseñas no coinciden ", "error") </script>' !!}
    @endif

    @if (session()->has('correoExiste'))
        {!! '<script> Swal.fire("Error al registrarte", "Correo ya registrado", "error") </script>' !!}
    @endif

    @if (session()->has('ClaveExiste'))
        {!! '<script> Swal.fire("Error al registrarte", "Clavde id ya registrada", "error") </script>' !!}
    @endif

    @if (
        $errors->first('nombre') &&
            $errors->first('apellido') &&
            $errors->first('clave_id') &&
            $errors->first('no_telefono') &&
            $errors->first('confirContra') &&
            $errors->first('contraseña') &&
            $errors->first('correo'))
        <div class="alerta-errs">
            <p>

                <img src="./img/signo-de-exclamacion1.png" class="imgane"> Completa todos los campos

                <img src="./img/cerrar.png" class="imagen2" id="close">
            </p>
        </div>
    @elseif (
        $errors->first('nombre') ||
            $errors->first('apellido') ||
            $errors->first('clave_id') ||
            $errors->first('no_telefono') ||
            $errors->first('confirContra') ||
            $errors->first('contraseña') ||
            $errors->first('correo'))
        <div class="alerta-errs">
            <p class="p-erros">
                @if ($errors->first('nombre'))
                    <img src="./img/signo-de-exclamacion1.png" class="imgane"> {{ $errors->first('nombre') }}
                @endif
                <img src="./img/cerrar.png" class="imagen2" id="close">
            </p>
            <p>
                @if ($errors->first('apellido'))
                    <img src="./img/signo-de-exclamacion1.png" class="imgane"> {{ $errors->first('apellido') }}
                @endif
            </p>
            <p>
                @if ($errors->first('clave_id'))
                    <img src="./img/signo-de-exclamacion1.png" class="imgane"> {{ $errors->first('clave_id') }}
                @endif
            </p>
            <p>
                @if ($errors->first('correo'))
                    <img src="./img/signo-de-exclamacion1.png" class="imgane"> {{ $errors->first('correo') }}
                @endif
            </p>
            <p>
                @if ($errors->first('contraseña'))
                    <img src="./img/signo-de-exclamacion1.png" class="imgane"> {{ $errors->first('contraseña') }}
                @endif
            </p>
            <p>
                @if ($errors->first('confirContra'))
                    <img src="./img/signo-de-exclamacion1.png" class="imgane"> {{ $errors->first('confirContra') }}
                @endif
            </p>
        </div>
    @endif

    <div class="cont-form">
        <form method="POST" action="{{ route('Admin.store') }}" class="form-alumnos">
            @csrf
            <h2 class="h1-reg">Registrate</h2>
            <div class="div-nombre_apellido">


                <input type="text" value="{{ old('nombre') }}" class="input-alumno inputsdouble" name="nombre"
                    placeholder="Nombre">
                {{-- <p class="p-errors">{{ $errors->first('nombre') }}</p> --}}

                <input type="text" value="{{ old('apellido') }}" class="input-alumno" name="apellido"
                    placeholder="Apellido">
                {{-- <p class="p-errors">{{ $errors->first('apellido') }}</p> --}}

            </div>

            <div class="div-nombre_apellido">


                <input type="text" value="{{ old('clave_id') }}" class="input-alumno inputsdouble" name="clave_id"
                    placeholder="clave_id">
                {{-- <p class="p-errors">{{ $errors->first('clave_id') }}</p> --}}

                <input type="text" value="{{ old('no_telefono') }}" class="input-alumno" name="no_telefono"
                    placeholder="No_telefono">
                {{-- <p class="p-errors">{{ $errors->first('no_telefono') }}</p> --}}


            </div>
            <input type="text" value="{{ old('correo') }}" class="input-alumno " name="correo" placeholder="Correo">
            {{-- <p class="p-errors">{{ $errors->first('correo') }}</p> --}}
            <input type="password" value="{{ old('contraseña') }}" class="input-alumno " name="contraseña"
                placeholder="Contraseña">
            {{-- <p class="p-errors">{{ $errors->first('contraseña') }}</p> --}}
            <input type="password" value="{{ old('confirContra') }}" class="input-alumno " name="confirContra"
                placeholder="Confirma Contraseña">
            {{-- <p class="p-errors">{{ $errors->first('confirContra') }}</p> --}}
            <div class="cont-btn">
                <button type="submit" class="btn-aceptar">Aceptar</button>
            </div>
        </form>
    </div>

@stop
