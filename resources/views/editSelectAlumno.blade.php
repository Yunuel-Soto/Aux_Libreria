<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Configuraciones Alumno</title>
</head>

<body class="info-body cuerpo">
    @if (session()->has('noGuardado'))
        {!! '<script> Swal.fire("Error al guardar cambios", "llena los campos adecuadamente", "error") </script>' !!}
    @endif

    <header class="cont-barra">
        <ul class="nvar1">
            <li class="li-img"><img src="./img/add-alt.png" alt="" class="imgplus plus"><a
                    href="{{ route('main') }}" class="a-cont efecto">Libros</a>
            </li>
        </ul>
    </header>
    <form action="{{ route('setPostA', $datosUs->Matricula) }}" method="POST" class="art-info">
        @csrf
        <br><br>
        Configuración de sistema.
        <div class="div-father">Cambiar color base, modo claro/modo obscuro <div class="span">
                <div class="circulo"></div>
            </div>
        </div>
        <input id="colorIn" name="estado" type="text" value="{{ $datosUs->estado }}" hidden>
        </section>
        <br>
        <div class="cont-btn-settings"><button class="btn-settings">Guardar cambios</button></div>
    </form>
</body>
<script defer src="./js/settings.js"></script>

</html>
