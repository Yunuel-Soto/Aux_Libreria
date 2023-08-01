/*
    SETTINGS PARA AGREGAR LIBROS
    Se encarga de cambiar las propiedades a modo obscuro en
    la vista agregar libros.
*/
const form_libros = document.querySelector(".form-alumnos");
const f_libros = document.querySelector(".cont-form-libros");
const title_libros = document.querySelector(".h1-reg");
/*
    Evalua si el input oculto contiene ya un estado o no, de no tenerlo
    le asigna el blanco como predeterminado.
*/
if (estado.value == "blanco") {
    body.style.backgroundColor = "white";
} else {
    form_libros.style.backgroundColor = "rgb(59, 59, 59)";
    form_libros.style.boxShadow = "0px 0px 10px 2px white";
    title_libros.style.backgroundColor = "#0f0f0f";
    f_libros.style.backgroundColor = "rgb(59, 59, 59)";
    n_alumnos.style.color = "white";
    nc.style.color = "white";
}
