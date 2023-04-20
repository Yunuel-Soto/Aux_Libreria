@extends('Layout.plantilla4')

@section('titulo_documento', 'Alumnos')

@section('contenido')

    @if (session()->has('alumnoEditado'))
        {!! '<script> Swal.fire("Alumno actualizado", "Alumno actualizado correctamente", "success") </script>' !!}
    @endif

    <div class="cont-alumnos">

        <form action="" class="cont-input-alumnos">
            <input class="input-search-alumnos" type="search" name="buscador-alumnos"
                placeholder="Busca preferentemente por matricula">
            <button type="submit" class="btn-search-alumnos">Buscar</button>
        </form>
        @if (count($alumnos) == 0)
            <h5 class="noSe">No se encontraron coincidencias</h5>
        @endif

        <input type="hidden" value="{{ $alumnosCont = 0 }}">
        <input type="hidden" value="{{ $bibliosCont = 0 }}">

        @foreach ($alumnos as $alumno)
            @include('modalEliminarAlumno', ['id' => $alumno->Matricula])
            <input type="hidden" value="{{ $alumnosCont++ }}">
            <div class="card-alumnos">
                <div class="cont-img-alumno"><a class="cont-a-img" href="{{ route('shAlumno', $alumno->Matricula) }}"><img
                            class="img-usu-logo" src="/img/moreusuario.png" alt="/img/ususario.png"></a>
                </div>
                <div class="cont-contenido-alumno">
                    <div class="info-general-alumno">
                        <p class="text-alum">Nombre: {{ $alumno->nombre }} {{ $alumno->apellido }}</p>
                        <p class="text-alum">Matricula: {{ $alumno->Matricula }}</p>
                        <p class="text-alum">Carrera: {{ $alumno->carrera }}</p>
                        <p class="text-alum">Correo: {{ $alumno->correo }}</p>
                        <p class="text-alum">No. telefono: {{ $alumno->no_telefono }}</p>
                    </div>
                    <div class="info-libros-alumno">
                        <input type="hidden" value="{{ $contadorLibros = 0 }}">
                        <input type="hidden" value="{{ $repeticiones = 0 }}">
                        <input type="hidden" value="{{ $repeticionesFalse = 0 }}">

                        @foreach ($bibliotecas as $biblio)
                            @if ($biblio->matricula == $alumno->Matricula)
                                <input type="hidden" value="{{ $contadorLibros++ }}">
                                @if ($biblio->status == 'false')
                                    <input type="hidden" value="{{ $repeticionesFalse++ }}">
                                @endif
                            @endif
                        @endforeach
                        <input type="hidden" value="{{ $bibliosCont = 0 }}">
                        @foreach ($bibliotecas as $biblio)
                            @if ($biblio->matricula == $alumno->Matricula)
                                <input type="hidden" value="{{ $repeticiones++ }}">
                                @if ($repeticiones == 1)
                                    <input type="hidden" value="{{ $bibliosCont++ }}">
                                    @if ($contadorLibros > 1)
                                        <p class="text-libs">El alumno tiene {{ $contadorLibros }} Libros</p>
                                    @endif
                                    @if ($contadorLibros <= 1)
                                        <p class="text-libs">El alumno tiene {{ $contadorLibros }} Libro</p>
                                    @endif
                                    @if ($repeticionesFalse > 0)
                                        <p class="text-libs">Y tiene <label class="falsos">{{ $repeticionesFalse }}</label>
                                            con retraso
                                        </p>
                                    @endif
                                    @if ($repeticionesFalse == 0)
                                        <p class="text-libs">Y tiene <label
                                                class="verdaderos">{{ $repeticionesFalse }}</label> con retraso
                                        </p>
                                    @endif
                                @endif
                            @endif
                        @endforeach

                        {{-- Para que me imprima solo si hay mas alumnos que bibliotecas --}}
                        @if ($bibliosCont == 0)
                            {{-- Para que me imprima solo en cuando los alumnos superen a las bibliotecas totales --}}
                            <p class="text-libs">El alumno tiene <label>0</label> Libros</p>
                            <p class="text-libs">Y tiene <label class="verdaderos">0</label> con retrazo</p>
                        @endif

                        <div class="cont-anclas-footer newTam">
                            <a title="Eliminar" class="a-eliminar a-editar-tam" data-bs-toggle="modal"
                                data-bs-target="#modalEliminarAlumno{{ $alumno->Matricula }}"><img
                                    src="/img/moreeliminar.png" alt="Eliminar" class="icon-elimar"></a>

                            <a title="Editar" href="{{ route('Alumno.edit', $alumno->Matricula) }}" class="a-editar"><img
                                    src="/img/moreeditar.png" alt="Editar Libro" class="icon-editar"></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@stop
