// const body = document.querySelector("body");
// const nvar = document.querySelector(".cont-barra");
// const titulo_nvar = document.querySelector(".a-cont");
// const estado = document.querySelector("#colorIn");
/*
    SETTINGS PARA LA VISTA DE INICIO
    Solo se agregan las etiquetas faltantes para que toda la vista
    cambie adecuadamente a un formato obscuro
*/
const title_carrusel = document.querySelector(".titulo-menu");
const carrusel = document.querySelector(".carrousel");
/*
    Evalua si el input oculto contiene ya un estado o no, de no tenerlo
    le asigna el blanco como predeterminado.
*/
if (estado.value == "blanco") {
    body.style.backgroundColor = "white";
}

if (estado.value == "negro") {
    body.style.backgroundColor = "rgb(59, 59, 59)";
    nvar.style.backgroundColor = "#0F0F0F";
    titulo_nvar.style.color = "white";
    carrusel.style.backgroundColor = "rgb(59, 59, 59)";
    title_carrusel.style.color = "white";
}
