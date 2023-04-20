@extends('Layout.plantilla')

@section('titulo_documento', 'Biblioteca')

@section('contenido')

    @if (session()->has('NoGuardado'))
        {!! '<script> Swal.fire("Error al solicitar libro", "No hay unidades disponibles", "error") </script>' !!}
    @endif
    @if (session()->has('NoEncontrado'))
        {!! '<script> Swal.fire("Error al solicitar libro", "Libro no encontrado", "error") </script>' !!}
    @endif
    @if (session()->has('No2Veces'))
        {!! '<script> Swal.fire("Error al solicitar libro", "Ya tienes este libro", "error") </script>' !!}
    @endif
    @if (session()->has('ExedisteLibros'))
        {!! '<script> Swal.fire("Error al solicitar libro", "Solo puedes llevar 3 libros", "error") </script>' !!}
    @endif
    @if (session()->has('FechaT_mayor_FechaIni'))
        {!! '<script> Swal.fire("Error al solicitar libro", "La fecha de entrega no puede ser mayor a la de expedicion", "error") </script>' !!}
    @endif
    @if (session()->has('CampoVacio'))
        {!! '<script> Swal.fire("Error al solicitar libro", "Dejaste un campo vacio", "error") </script>' !!}
    @endif
    @if (session()->has('libroAgregado'))
        {!! '<script> Swal.fire("Libro agregado", "Libro solicitado correctamente", "success") </script>' !!}
    @endif
    @if (session()->has('Notienes'))
        {!! '<script> Swal.fire("No hay libros", "No tienes ningun libro en tu biblioteca personal", "error") </script>' !!}
    @endif
    <div class="cont-consultaLibros">
        <div class="cont-busqueda">
            {{-- Ya esta el dato de la busqueda desde la plantilla, ruta y
                la funcion store. Solo falta implementarlo en este filter --}}

            <form method="POST" action="{{ route('library.alumno.search', [$matricula, $busqueda]) }}" class="form-filter">
                @csrf
                <div class="cont-filter">
                    <input name="search" type="search" class="input-filter" placeholder="Buscar">
                    <button type="submit" class="btn-search"><img src="/img/buscar.png" alt=""
                            class="img-busqueda"></button>
                </div>
                <div class="cont-anclas-carreras">
                    <a type="submit" href="{{ route('library.alumno', [$matricula, 'todos']) }}"
                        class="anclas-carreras efecto">Todos los libros</a>
                    <br><br>
                    <a type="submit"
                        href="{{ route('library.alumno', [$matricula, 'Ingenieria en Sistemas computacionales']) }}"
                        class="anclas-carreras efecto">Ingenieria en Sistemas
                        computacionales</a>
                    <br><br>
                    <a type="submit" href="{{ route('library.alumno', [$matricula, 'Ingenieria Mecatronica']) }}"
                        class="anclas-carreras efecto">Ingenieria Mecatronica</a>
                    <br><br>
                    <a type="submit"
                        href="{{ route('library.alumno', [$matricula, 'Ingenieria en Tecnologia Automotriz']) }}"
                        class="anclas-carreras efecto">Ingenieria en Tecnologia Automotriz</a>
                    <br><br>
                    <a type="submit"
                        href="{{ route('library.alumno', [$matricula, 'Ingenieria en Tecnologia en Manufactura']) }}"
                        class="anclas-carreras efecto">Ingenieria en Tecnologia en Manufactura</a>
                    <br><br>
                    <a type="submit"
                        href="{{ route('library.alumno', [$matricula, 'Ingenieria en Redes y Telecomunicaciones']) }}"
                        class="anclas-carreras efecto">Ingenieria en Redes y Telecomunicaciones</a>
                    <br><br>
                    <a type="submit"
                        href="{{ route('library.alumno', [$matricula, 'Licenciatura en Administracion y Gestion de Empresas']) }}"
                        class="anclas-carreras efecto">Licenciatura en Administracion y Gestion de
                        Empresas</a>
                    <br><br>
                    <a type="submit"
                        href="{{ route('library.alumno', [$matricula, 'Licenciatura en Negocios Internacionales']) }}"
                        class="anclas-carreras efecto">Licenciatura en Negocios Internacionales</a>
                </div>
            </form>
        </div>
        <div class="cont-consultaBooks">
            @foreach ($consulta as $libro)
                @include('modalMasInformacionLibros', ['id' => $libro->id_libro])
                @include('modalAgregar', ['idlibro' => $libro->id_libro, 'matricula', 'busqueda'])

                <div class="cont-card">
                    <a title="Más Informacion" class="masInfo" data-bs-toggle="modal"
                        data-bs-target="#modalMasInformacionLibros{{ $libro->id_libro }}">
                        <div class="cont-img">
                            <img src="/img/portadas/{{ $libro->imagen }}" alt="Portada" class="img-portada">
                        </div>
                    </a>
                    <div class="cont-info">
                        <p class="title"> {{ $libro->titulo }}</p>
                    </div>
                    <div class="cont-footer">
                        <div class="cont-anclas-footer">
                            <a title="Agregar" class="a-agregar" data-bs-toggle="modal"
                                data-bs-target="#modalAgregar{{ $libro->id_libro, $matricula, $busqueda }}"><img
                                    class="icono-agregar" src="/img/plus.png" alt="Icono"></a>
                            {{-- Ya puedo llamara a $matricula --}}
                        </div>
                        <p class="Cantidad">{{ $libro->disponibles }}/{{ $libro->cantidad }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
