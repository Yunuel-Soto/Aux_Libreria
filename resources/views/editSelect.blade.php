<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Configuraciones</title>
</head>

<body class="info-body cuerpo">
    @if (session()->has('noGuardado'))
        {!! '<script> Swal.fire("Error al guardar cambios", "llena los campos adecuadamente", "error") </script>' !!}
    @endif

    <header class="cont-barra">
        <ul class="nvar1">
            <li class="li-img"><img src="./img/add-alt.png" alt="" class="imgplus plus"><a
                    href="{{ route('main2') }}" class="a-cont efecto">Libros</a>
            </li>
            <li id="element"><img src="/img/usuario.png" alt="" class="imagenUs"
                    id="imagenUs">{{ $datosUs->clave_id }}<div class="span">
                    <div class="circulo"></div>
                </div>

            </li>
        </ul>
    </header>

    <p class="parrafo1">¡Bienvenido a las configuraciones de perfil!</p>
    <p class="parrafo1">Para guardar los cambios tienes que presionar el boton. Puedes editar tus datos las veces que
        necesites.</p>

    <div class="cont-form cont-login">
        <form id="form-settings" action="{{ route('setPost', $datosUs->clave_id) }}" method="POST"
            class="form-alumnos">
            @csrf

            <input class="input-alumno" type="text" class="input-info" value="{{ $datosUs->nombre }}" name="nombre">
            <input class="input-alumno" type="text" class="input-info" value="{{ $datosUs->apellido }}"
                name="apellidos">
            <input class="input-alumno" type="number" class="input-info" value="{{ $datosUs->no_telefono }}"
                name="no_telefono">
            <input class="input-alumno" type="email" class="input-info" value="{{ $datosUs->correo }}" name="correo">
            <input class="input-alumno" type="text" name="password" class="input-info"
                value="{{ $datosUs->contraseña }}">

            <input id="colorIn" name="estado" type="text" value="{{ $datosUs->estado }}" hidden>

            <div class="cont-btn-settings"><button class="btn-settings">Guardar cambios</button></div>
        </form>
    </div>
</body>
<script defer src="./js/settings.js"></script>

</html>
