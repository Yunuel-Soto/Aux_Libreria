// const body = document.querySelector("body");
// const nvar = document.querySelector(".cont-barra");
// const titulo_nvar = document.querySelector(".a-cont");
// const estado = document.querySelector("#colorIn");

const title_carrusel = document.querySelector(".titulo-menu");

const carrusel = document.querySelector(".carrousel");

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
