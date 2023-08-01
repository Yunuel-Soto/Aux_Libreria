/*
    SETTINGS PARA LA VISTA DE LA CONSULTA LIBROS
    Solo se agregan las etiquetas faltantes para que toda la vista
    cambie adecuadamente a un formato obscuro
*/
const search = document.querySelector(".cont-busqueda");
const anclas = document.querySelectorAll(".anclas-carreras");

/*
    Evalua si el input oculto contiene ya un estado o no, de no tenerlo
    le asigna el blanco como predeterminado.
*/
if (estado.value == "blanco") {
    body.style.backgroundColor = "white";
    search.style.backgroundColor = "";
} else {
    search.style.backgroundColor = "#0f0f0f";
    anclas.forEach((cadaUno, i) => {
        anclas[i].style.color = "white";
    });
}
