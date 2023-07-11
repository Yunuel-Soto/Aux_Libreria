const search = document.querySelector(".cont-busqueda");
const anclas = document.querySelectorAll(".anclas-carreras");

if (estado.value == "blanco") {
    body.style.backgroundColor = "white";
} else {
    search.style.backgroundColor = "#0f0f0f";
    anclas.forEach((cadaUno, i) => {
        anclas[i].style.color = "white";
    });
}
