/*
    CORRESPONDIENTE A LA VISTA DE SETTINGS DEL ADMIN
*/

// Para el switch button
const circle = document.querySelector(".circulo");
const span = document.querySelector(".span");

const body = document.querySelector("body");
const nvar = document.querySelector(".cont-barra");
const titulo_nvar = document.querySelector(".a-cont");
// Input que contiene el como valor el estado negro o blanco
const estado = document.querySelector("#colorIn");
// Contenedor de la clave_Id y de la imagen
const element = document.querySelector("#element");

const p = document.querySelectorAll(".parrafo1");
const form = document.querySelector("#form-settings");
const inputs = document.querySelectorAll(".input-alumno");

let click = "apagado";

/*
    Evalua si el input oculto contiene ya un estado o no, de no tenerlo
    le asigna el blanco como predeterminado.
*/
if (estado.value == "") {
    estado.value = "blanco";
}
/*
    Evalua el estado del input para asignar el color de fondo
*/
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
/*
    Le agrega un evento al switch para que cuando le apretes, cambie
    de color el fondo y de posicion el switch. Empieza dependiendo del
    estado inicial del input. Aqui se asigna el estado.
*/
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
