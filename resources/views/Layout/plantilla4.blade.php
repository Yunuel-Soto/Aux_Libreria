<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="shortcut icon" href="./img/libro.png" />
    <script defer src="./js/app.js"></script>
    <script defer src="./js/settingsInicio.js"></script>
    <script defer src="./js/settingsALibros.js"></script>
    <script defer src="./js/settingsCLibros.js"></script>
    <script defer src="./js/settingsAlumno.js"></script>
    <script defer src="./js/settingsEditA.js"></script>

    <title>@yield('titulo_documento')</title>
</head>

{{-- PARA EL CONTENIDO EN GENERAL (ADMINS) --}}

<body class="cuerpo">
    <header class="cont-barra">
        <input id="colorIn" name="estado" type="text" value="{{ $_SESSION['estado'] }}" hidden>

        <ul class="nvar1">
            <li class="li-img"><img src="./img/add-alt.png" alt="" class="imgplus plus"><a
                    href="{{ route('main2') }}" class="a-cont efecto">Libros</a>
            </li>
            <li class="li-m">
                <a class="a-cont" id="dropdownMenuLink" data-bs-toggle="dropdown"><label class="efecto">En
                        biblioteca</a>
                <ul class="contenedirDROP_Libros dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item li-drop" href="{{ route('addLibros') }}">Agregar Libro</a></li>
                    <li><a class="dropdown-item li-drop" href="{{ route('library', 'todos') }}">Consultar Libros</a>
                    </li>
                </ul>
            </li>
            <li class="li-mb efecto"><a href="{{ route('alumnos.show') }}" class="a-cont">Alumnos</a></li>
        </ul>
        <ul class="nvar2 dropdown">
            <a class="cont-line plus" id="dropdownMenuLink" data-bs-toggle="dropdown">
                <div class="div-lin lin1"></div>
                <div class="div-lin"></div>
                <div class="div-lin"></div>
            </a>
            <ul class="contenedirDROP dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a href="{{ route('main2') }}" class="dropdown-item li-drop" href="#"><img
                            src="/img/usuario.png" alt="">
                        {{ $_SESSION['nombre'] }}</a></li>
                <li><a class="dropdown-item li-drop" href="{{ route('sett', $_SESSION['clave_id']) }}"><img
                            src="/img/engranaje.png" alt="">
                        Configuraciónes</a></li>
                <li><a class="dropdown-item li-drop" href="{{ route('open') }}"><img src="/img/cerrar-sesion.png"
                            alt="">
                        Salir</a></li>
            </ul>
        </ul>
    </header>
    @yield('contenido')


</body>

</html>
