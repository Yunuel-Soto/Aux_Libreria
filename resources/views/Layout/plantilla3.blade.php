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
    <script defer src="./js/singAlumno.js"></script>
    <script defer src="./js/singAdmin.js"></script>

    <link rel="stylesheet" href="./style/style.css">
    <link rel="shortcut icon" href="./img/libro.png" />
    <title>@yield('titulo_documento')</title>

    <link rel="stylesheet" href="./style/responsive.css">

</head>

{{-- PARA LOS LOGINS Y SINGINS --}}

<body class="body-forms">
    <header class="cont-barra">
        <ul class="nvar1">
            <li class="li-img"><img src="./img/add-alt.png" alt="" class="imgplus size-img">
                <a href="{{ route('open') }}" class="a-cont size-lib">Libros</a>
            </li>
        </ul>
    </header>
    @yield('contenido')
</body>

</html>
