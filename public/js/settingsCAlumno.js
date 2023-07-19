const noSe = document.querySelector(".noSe");
const inputSearch = document.querySelector(".input-search-alumnos");

console.log(estado.value);

if (estado.value == "blanco") {
    noSe.style.color = "black";
    inputSearch.style.color = "black";
}
if (estado.value == "negro") {
    noSe.style.color = "white";
    inputSearch.style.color = "white";
}
