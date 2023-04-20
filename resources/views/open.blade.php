@extends('Layout.plantilla2')

@section('titulo_documento', 'LibrosPlus')

@section('contenido')
    <div class="body-cont">
        <div class="botones">
            <a href="{{ route('LogAlumnos') }}"><button class="registrate al">Alumno</button></a>
            <a href="{{ route('LogAdmins') }}"><button class="registrate ad">Administrativos</button></a>
        </div>
        <div class="anclas">
            <a href="{{ route('SingAlumnos') }}" class="logeate">Registrate</a>
            <a href="{{ route('SingAdmins') }}" class="logeate">Registrate</a>
        </div>
    </div>
@stop
