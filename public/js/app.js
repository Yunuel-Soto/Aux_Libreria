const grande = document.querySelector(".grande");
const punto = document.querySelectorAll(".punto");
const imgc = document.querySelectorAll(".img-c");

// Cuando hago clic en punto
//saber la posicion de ese punto
//aplicar un transform translate al grande
//QUITAR la clase activo de todos los puntos
//AÑADIR la clase activo al punto que hemos hecho clic

punto.forEach((cadaPunto, i) => {
    punto[i].addEventListener("click", () => {
        let posicion = i;

        //posicion es 0 el tranformx es 0
        //cuando es 1 tranformx es -50%
        //operacion = posicion * -50
        let operacion = posicion * -16;

        grande.style.transform = `translateX(${operacion}%)`;

        punto.forEach((cadaPunto, i) => {
            punto[i].classList.remove("activo");
        });
        imgc.forEach((cadaImg, i) => {
            imgc[i].classList.add("scale");
        });
        imgc[i].classList.remove("scale");
        punto[i].classList.add("activo");
    });
});
