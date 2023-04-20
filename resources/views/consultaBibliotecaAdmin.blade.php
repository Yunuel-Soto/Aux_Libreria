@extends('Layout.plantilla4')

@section('titulo_documento', 'Biblioteca')

@section('contenido')

    @if (session()->has('succesAdmin'))
        {!! '<script> Swal.fire("Buen trabajo", "Libro actualizado", "success") </script>' !!}
    @endif

    <div class="cont-consultaLibros">
        <div class="cont-busqueda">
            {{-- Le quite la ruta y cagadamente funciono --}}
            <form action="" class="form-filter">
                <div class="cont-filter">
                    <input name="search" type="search" class="input-filter" placeholder="Buscar">
                    <button type="submit" class="btn-search"><img src="/img/buscar.png" alt=""
                            class="img-busqueda"></button>
                </div>
                <div class="cont-anclas-carreras">
                    <a type="submit" href="{{ route('library', ['todos']) }}" class="anclas-carreras efecto">Todos los
                        libros</a>

                    <br><br>
                    <a type="submit" href="{{ route('library', ['Ingenieria en Sistemas computacionales']) }}"
                        class="anclas-carreras efecto">Ingenieria en Sistemas computacionales</a>
                    <br><br>
                    <a type="submit" href="{{ route('library', ['Ingenieria Mecatronica']) }}"
                        class="anclas-carreras efecto">Ingenieria Mecatronica</a>
                    <br><br>
                    <a type="submit" href="{{ route('library', ['Ingenieria en Tecnologia Automotriz']) }}"
                        class="anclas-carreras efecto">Ingenieria en Tecnologia Automotriz</a>
                    <br><br>
                    <a type="submit" href="{{ route('library', ['Ingenieria en Tecnologia en Manufactura']) }}"
                        class="anclas-carreras efecto">Ingenieria en Tecnologia en Manufactura</a>
                    <br><br>
                    <a type="submit" href="{{ route('library', ['Ingenieria en Redes y Telecomunicaciones']) }}"
                        class="anclas-carreras efecto">Ingenieria en Redes y Telecomunicaciones</a>
                    <br><br>
                    <a type="submit"
                        href="{{ route('library', ['Licenciatura en Administracion y Gestion de Empresas']) }}"
                        class="anclas-carreras efecto">Licenciatura en Administracion y Gestion de
                        Empresas</a>
                    <br><br>
                    <a type="submit" href="{{ route('library', ['Licenciatura en Negocios Internacionales']) }}"
                        class="anclas-carreras efecto">Licenciatura en Negocios Internacionales</a>
                </div>
            </form>
        </div>
        <div class="cont-consultaBooks">
            @foreach ($consulta as $libro)
                @include('modalEliminarLibros', ['id' => $libro->id_libro, 'busqueda'])
                @include('modalMasInformacionLibros', ['id' => $libro->id_libro])

                <div class="cont-card">
                    <a title="Más Informacion" class="masInfo" data-bs-toggle="modal"
                        data-bs-target="#modalMasInformacionLibros{{ $libro->id_libro }}">
                        <div class="cont-img">
                            <img src="/img/portadas/{{ $libro->imagen }}" alt="Portada" class="img-portada">
                        </div>
                    </a>
                    <div class="cont-info">
                        <p class="title">{{ $libro->titulo }}</p>
                    </div>
                    <div class="cont-footer">
                        <div class="cont-anclas-footer">
                            {{-- <a href="" class="a-agregar"><img src="/img/plus.png" alt=""></a> --}}
                            <a title="Eliminar" class="a-eliminar" data-bs-toggle="modal"
                                data-bs-target="#modalEliminarLibros{{ $libro->id_libro, $busqueda }}"><img
                                    src="/img/eliminar.png" alt="Eliminar" class="icon-elimar"></a>

                            <a title="Editar" href="{{ route('libros.edit', [$libro->id_libro, $busqueda]) }}"
                                class="a-editar"><img src="/img/editar.png" alt="Editar Libro" class="icon-editar"></a>
                        </div>
                        <p class="Cantidad">{{ $libro->disponibles }}/{{ $libro->cantidad }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
