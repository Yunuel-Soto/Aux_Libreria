@extends('Layout.plantilla')

@section('titulo_documento', 'LibrosPlus')

@section('contenido')

    @if (session()->has('EntregaYa'))
        {!! '<script> Swal.fire("Revisa tu biblioteca Personal", "Tienes libros con retraso", "warning") </script>' !!}
    @endif

    {{-- <h1 class="titulo-menu">Novedades</h1> --}}
    <div class="carrousel">
        <h1 class="titulo-menu">Novedades</h1>
        <div class="grande">
            <img src="./img/python.jfif" alt="Imagen1" class="img-c scale" />
            <img src="./img/fluidos.jfif" alt="Imagen2" class="img-c scale" />
            <img src="./img/OIP.jfif" alt="imagen3" class="img-c" />
            <img src="./img/OIP (1).jfif" alt="" class="img-c scale" imagen4="" />
        </div>

        <ul class="puntos">
            <li class="punto"></li>
            <li class="punto"></li>
            <li class="punto activo"></li>
            <li class="punto"></li>
        </ul>
    </div>

@stop
