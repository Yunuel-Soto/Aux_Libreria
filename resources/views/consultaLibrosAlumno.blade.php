@extends('Layout.plantilla4')

@section('titulo_documento', 'Biblioteca personal')

@section('contenido')

    @if (session()->has('libroEntregado'))
        {!! '<script> Swal.fire("Buen trabajo", "Libro entregado", "success") </script>' !!}
    @endif
    <h2 class="Nombre-alumno">Libros de {{ $alumno->nombre }} {{ $alumno->apellido }}</h2>
    <div class="cont-cards-librosAlumno">
        @if (count($bibliosPersonal) > 0)
            @foreach ($libros as $libro)
                <div class="cont-card">
                    <a title="Más Informacion" class="masInfo" data-bs-toggle="modal"
                        data-bs-target="#modalMasInformacionLibros{{ $libro->id_libro }}">
                        <div class="cont-img">
                            <img src="/img/portadas/{{ $libro->imagen }}" alt="Portada" class="img-portada">
                        </div>
                    </a>
                    <div class="cont-info">
                        <p class="title">{{ $libro->titulo }}</p>

                        <input type="hidden" value="{{ $id_biblioPersonal = '' }}">
                        @foreach ($bibliosPersonal as $personal)
                            @if ($personal->id_libro == $libro->id_libro)
                                <input type="hidden" value="{{ $id_biblioPersonal = $personal->id_biblioPersonal }}">
                                <p class="title t-2">Del <strong>{{ $personal->Fecha_expedicion }}</strong> al
                                    <strong>{{ $personal->Fecha_termino }}</strong>
                                </p>
                                @if ($restante[$i] == 0)
                                    <p class="title t-2">Tienes retrazo</p>
                                @endif
                                @if ($restante[$i] > 0)
                                    <p class="title t-2">No tiene retrazo</p>
                                @endif
                                @if ($restante[$i] < 0)
                                    <p class="title t-2">Tienes retrazo de <label class="p-red">{{ $restante[$i] }}</label>
                                        dias</p>
                                @endif
                                <input type="hidden" valude="{{ $i++ }}">
                            @endif
                        @endforeach

                    </div>
                    <form class="cont-footer "
                        action="{{ route('sh.library.update', [$alumno->Matricula, $libro->id_libro]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="cont-anclas-footer">
                            <button class="btn-entregado">Entregado</button>
                        </div>
                    </form>
                </div>
            @endforeach
        @endif
        @if (count($bibliosPersonal) == 0)
            <h5 class="noSe">No tiene libros en posesión </h5>
        @endif
    </div>


@stop
