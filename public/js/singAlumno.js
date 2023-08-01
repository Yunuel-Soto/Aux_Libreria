/*
    PARA EL SING IN DE ALUMNOS, QUE PERMITE
    CREAER UN CORREO EN CUANTO TECLEES TU MATRICULA
*/
const $inputM = document.querySelector("#matricula");
const $inputC = document.querySelector("#correo");

$inputM.addEventListener("input", () => {
    $inputC.value = `${$inputM.value}@upq.edu.mx`;
});
