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
        </ul>
    </header>
    <form action="{{ route('setPost', $datosUs->clave_id) }}" method="POST" class="art-info">
        @csrf
        <p class="parrafo1">¡Bienvenido a las configuraciones de perfil!</p><br>
        <section class="sect-info">Tu nombre de usuario tanto tus datos personales se pueden modificar en caso de algún
            error al logearte. Modifica tu nombre: <input type="text" class="input-info"
                value="{{ $datosUs->nombre }}" name="nombre"> apellidos:
            <input type="text" class="input-info" value="{{ $datosUs->apellido }}" name="apellidos">. <br>
            Tambien puedes configurar tu contacto o actualizar en caso de que sea necesario. <br><br>¡Recuerda!, solo
            podrás
            cambiar tu contacto un número de veces limitadas por mes.<br>
            Número de teléfono: <input type="number" class="input-info" value="{{ $datosUs->no_telefono }}"
                name="no_telefono"> correo: <input type="email" class="input-info" value="{{ $datosUs->correo }}"
                name="correo">. <br> contraseña de inicio de sesion: <input type="text" name="password"
                class="input-info" value="{{ $datosUs->contraseña }}">. <br>En caso de que necesites recordarlo, tu
            clave id es la
            siguiente:
            <a>{{ $datosUs->clave_id }}</a>. <br><br>
            Configuración de sistema.
            <div class="div-father">Cambiar color base, modo claro/modo obscuro <div class="span">
                    <div class="circulo"></div>
                </div>
            </div>
            <input id="colorIn" name="estado" type="text" value="{{ $datosUs->estado }}" hidden>
        </section>
        <div class="cont-btn-settings"><button class="btn-settings">Guardar cambios</button></div>
    </form>
</body>
<script defer src="./js/settings.js"></script>

</html>
