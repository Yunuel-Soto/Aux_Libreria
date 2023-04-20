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

    <div class="cont-form">
        <form method="POST" action="{{ route('Admin.store') }}" class="form-alumnos">
            @csrf
            <h2 class="h1-reg">Registrate</h2>
            <div class="div-nombre_apellido">
                <div>
                    <input type="text" value="{{ old('nombre') }}" class="input-alumno" name="nombre" placeholder="Nombre">
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
                    <input type="text" value="{{ old('clave_id') }}" class="input-alumno" name="clave_id"
                        placeholder="clave_id">
                    <p class="p-errors">{{ $errors->first('clave_id') }}</p>
                </div>
                <div>
                    <input type="text" value="{{ old('no_telefono') }}" class="input-alumno" name="no_telefono"
                        placeholder="No_telefono">
                    <p class="p-errors">{{ $errors->first('no_telefono') }}</p>
                </div>
            </div>
            <input type="text" value="{{ old('correo') }}" class="input-alumno rewidth" name="correo"
                placeholder="Correo">
            <p class="p-errors">{{ $errors->first('correo') }}</p>
            <input type="password" value="{{ old('contraseña') }}" class="input-alumno rewidth" name="contraseña"
                placeholder="Contraseña">
            <p class="p-errors">{{ $errors->first('contraseña') }}</p>
            <input type="password" value="{{ old('confirContra') }}" class="input-alumno rewidth" name="confirContra"
                placeholder="Confirma Contraseña">
            <p class="p-errors">{{ $errors->first('confirContra') }}</p>
            <div class="cont-btn">
                <button type="submit" class="btn-aceptar">Aceptar</button>
            </div>
        </form>
    </div>

@stop
