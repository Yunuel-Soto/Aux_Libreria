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

    @if (
        $errors->first('nombre') &&
            $errors->first('apellido') &&
            $errors->first('matricula') &&
            $errors->first('carrera') &&
            $errors->first('no_telefono') &&
            $errors->first('correo') &&
            $errors->first('contraseña') &&
            $errors->first('confirContra'))

        <div class="alerta-errs">
            <p>

                <img src="./img/signo-de-exclamacion1.png" class="imgane"> Completa todos los campos

                <img src="./img/cerrar.png" class="imagen2" id="close">
            </p>
        </div>
    @elseif (
        $errors->first('nombre') ||
            $errors->first('apellido') ||
            $errors->first('matricula') ||
            $errors->first('carrera') ||
            $errors->first('no_telefono') ||
            $errors->first('correo') ||
            $errors->first('contraseña') ||
            $errors->first('confirContra'))
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
                @if ($errors->first('matricula'))
                    <img src="./img/signo-de-exclamacion1.png" class="imgane"> {{ $errors->first('matricula') }}
                @endif
            </p>
            <p>
                @if ($errors->first('carrera'))
                    <img src="./img/signo-de-exclamacion1.png" class="imgane"> {{ $errors->first('carrera') }}
                @endif
            </p>
            <p>
                @if ($errors->first('no_telefono'))
                    <img src="./img/signo-de-exclamacion1.png" class="imgane"> {{ $errors->first('no_telefono') }}
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
        <form method="POST" action="{{ route('Alumno.store') }}" class="form-alumnos">
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

                <input id="matricula" type="text" value="{{ old('matricula') }}" class="input-alumno inputsdouble"
                    name="matricula" placeholder="Matricula">
                {{-- <p class="p-errors">{{ $errors->first('matricula') }}</p> --}}


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
                {{-- <p class="p-errors">{{ $errors->first('carrera') }}</p> --}}
            </div>

            <input type="text" value="{{ old('no_telefono') }}" class="input-alumno rewidth" name="no_telefono"
                placeholder="No_telefono">
            {{-- <p class="p-errors">{{ $errors->first('no_telefono') }}</p> --}}
            <input id="correo" type="text" value="{{ old('correo') }}" class="input-alumno rewidth" name="correo"
                placeholder="Correo">
            {{-- <p class="p-errors">{{ $errors->first('correo') }}</p> --}}
            <input type="password" value="{{ old('contraseña') }}" class="input-alumno rewidth" name="contraseña"
                placeholder="Contraseña">
            {{-- <p class="p-errors">{{ $errors->first('contraseña') }}</p> --}}
            <input type="password" value="{{ old('confirContra') }}" class="input-alumno rewidth" name="confirContra"
                placeholder="Confirma Contraseña">
            {{-- <p class="p-errors">{{ $errors->first('confirContra') }}</p> --}}
            {{-- <input type="file" class="input-alumno rewidth file-input" name="confirContra" placeholder="Imagen"> --}}
            <div class="cont-btn">
                <button type="submit" class="btn-aceptar">Aceptar</button>
            </div>
        </form>
    </div>

@stop
