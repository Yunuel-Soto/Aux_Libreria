const circle = document.querySelector(".circulo");
const span = document.querySelector(".span");
const body = document.querySelector("body");
// const article = document.querySelector(".art-info");
const nvar = document.querySelector(".cont-barra");
const titulo_nvar = document.querySelector(".a-cont");

const estado = document.querySelector("#colorIn");
const element = document.querySelector("#element");
const p = document.querySelectorAll(".parrafo1");
const form = document.querySelector("#form-settings");

const inputs = document.querySelectorAll(".input-alumno");

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
    nvar.style.backgroundColor = "white";
    titulo_nvar.style.color = "black";
    colorIn.value = "blanco";
    p.forEach((index, i) => {
        p[i].style.color = "black";
    });
    form.style.background = "white";
    inputs.forEach((index, i) => {
        inputs[i].style.border = "1px solid black";
    });
} else {
    span.style.paddingLeft = "1.5rem";
    click = "encendido";
    span.style.backgroundColor = "rgb(59, 59, 59)";
    span.style.borderColor = "white";
    circle.style.backgroundColor = "white";
    body.style.backgroundColor = "rgb(59, 59, 59)";
    nvar.style.backgroundColor = "rgb(59, 59, 59)";
    titulo_nvar.style.color = "white";
    colorIn.value = "negro";
    element.style.color = "white";
    p.forEach((index, i) => {
        p[i].style.color = "white";
    });
    form.style.background = "rgb(59, 59, 59)";
}

span.addEventListener("click", () => {
    if (click == "apagado") {
        span.style.paddingLeft = "1.5rem";
        click = "encendido";
        span.style.backgroundColor = "rgb(59, 59, 59)";
        span.style.borderColor = "white";
        circle.style.backgroundColor = "white";
        body.style.backgroundColor = "rgb(59, 59, 59)";
        nvar.style.backgroundColor = "rgb(59, 59, 59)";
        titulo_nvar.style.color = "white";
        colorIn.value = "negro";
        element.style.color = "white";
        p.forEach((index, i) => {
            p[i].style.color = "white";
        });
        form.style.background = "rgb(59, 59, 59)";
    } else {
        span.style.paddingLeft = "0%";
        click = "apagado";
        span.style.backgroundColor = "white";
        span.style.borderColor = "black";
        circle.style.backgroundColor = "black";
        body.style.backgroundColor = "white";
        nvar.style.backgroundColor = "white";
        titulo_nvar.style.color = "black";
        colorIn.value = "blanco";
        element.style.color = "black";
        p.forEach((index, i) => {
            p[i].style.color = "black";
        });
        form.style.background = "white";
        inputs.forEach((index, i) => {
            inputs[i].style.border = "1px solid black";
        });
    }
});
