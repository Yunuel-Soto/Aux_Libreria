/*
    SETTINGS PARA LA VISTA DE LA CONSULTA ALUMNO
    Solo se agregan las etiquetas faltantes para que toda la vista
    cambie adecuadamente a un formato obscuro
*/
const noSe = document.querySelector(".noSe");
const inputSearch = document.querySelector(".input-search-alumnos");

console.log(estado.value);
/*
    Evalua si el input oculto contiene ya un estado o no, de no tenerlo
    le asigna el blanco como predeterminado.
*/
if (estado.value == "blanco") {
    noSe.style.color = "black";
    inputSearch.style.color = "black";
}
if (estado.value == "negro") {
    noSe.style.color = "white";
    inputSearch.style.color = "white";
}
