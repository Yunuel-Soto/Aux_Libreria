@extends('Layout.plantilla')

@section('titulo_documento', 'Mi Biblioteca personal')

@section('contenido')

    <div class="cont-cards">
        <h2 class="Nombre-alumno">Mi biblioteca</h2>
        @foreach ($books as $book)
            <div class="card">
                <div class="cont-img2"><img src="/img/portadas/{{ $book->imagen }}" alt="" class="portada">
                </div>
                <div class="cont-infoCompleta">
                    <div class="info-only">
                        {{-- <div class="info-only"> --}}
                        <div class="cont-textos">
                            <p class="texto-titulo">{{ $book->titulo }}</p>
                            <p class="text-infoPerson">Edicion: {{ $book->edicion }}</p>
                            <p class="text-infoPerson">Editorial: {{ $book->editorial }}</p>
                            <p class="text-infoPerson">Autor: {{ $book->autor }}</p>
                            <p class="text-infoPerson">Descripcion: {{ $book->tipo }}</p>
                        </div>
                        {{-- </div> --}}
                        @foreach ($dates as $date)
                            @if ($date->id_libro == $book->id_libro)
                                <footer class="footer-fechas">Del <strong>{{ $date->Fecha_expedicion }}</strong> al
                                    <strong>{{ $date->Fecha_termino }}</strong>
                                </footer>
                            @endif
                        @endforeach
                    </div>
                    <div class="cont-textoTime">
                        @if ($restante[$i] == 0)
                            <p class="text-infoPerson p-person">Te quedan <label class="p-red">{{ $restante[$i] }}</label>
                                dias</p>
                        @endif
                        @if ($restante[$i] > 1)
                            <p class="text-infoPerson p-person">Te quedan {{ $restante[$i] }} dias</p>
                        @endif
                        @if ($restante[$i] == 1)
                            <p class="text-infoPerson p-person">Te queda {{ $restante[$i] }} dia</p>
                        @endif
                        @if ($restante[$i] < 0)
                            <p class="text-infoPerson p-person">Retrazo de <label
                                    class="p-red">{{ $restante[$i] }}</label>
                                dias</p>
                        @endif
                        <input type="hidden" value="{{ $i++ }}">
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@stop
