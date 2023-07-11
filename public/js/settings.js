const circle = document.querySelector(".circulo");
const span = document.querySelector(".span");
const body = document.querySelector("body");
const article = document.querySelector(".art-info");
const nvar = document.querySelector(".cont-barra");
const titulo_nvar = document.querySelector(".a-cont");
const estado = document.querySelector("#colorIn");

let click = "apagado";

if (estado.value == "") {
    estado.value = "blanco";
}

if (estado.value == "blanco") {
    span.style.paddingLeft = "0%";
    click = "apagado";
    span.style.backgroundColor = "white";
    span.style.borderColor = "black";
    circle.style.backgroundColor = "black";
    body.style.backgroundColor = "white";
    article.style.color = "black";
    nvar.style.backgroundColor = "white";
    titulo_nvar.style.color = "black";
    colorIn.value = "blanco";
} else {
    span.style.paddingLeft = "1.5rem";
    click = "encendido";
    span.style.backgroundColor = "rgb(59, 59, 59)";
    span.style.borderColor = "white";
    circle.style.backgroundColor = "white";
    body.style.backgroundColor = "rgb(59, 59, 59)";
    article.style.color = "white";
    nvar.style.backgroundColor = "rgb(59, 59, 59)";
    titulo_nvar.style.color = "white";
    colorIn.value = "negro";
    // inicio
}

span.addEventListener("click", () => {
    if (click == "apagado") {
        span.style.paddingLeft = "1.5rem";
        click = "encendido";
        span.style.backgroundColor = "rgb(59, 59, 59)";
        span.style.borderColor = "white";
        circle.style.backgroundColor = "white";
        body.style.backgroundColor = "rgb(59, 59, 59)";
        article.style.color = "white";
        nvar.style.backgroundColor = "rgb(59, 59, 59)";
        titulo_nvar.style.color = "white";
        colorIn.value = "negro";
    } else {
        span.style.paddingLeft = "0%";
        click = "apagado";
        span.style.backgroundColor = "white";
        span.style.borderColor = "black";
        circle.style.backgroundColor = "black";
        body.style.backgroundColor = "white";
        article.style.color = "black";
        nvar.style.backgroundColor = "white";
        titulo_nvar.style.color = "black";
        colorIn.value = "blanco";
    }
});
