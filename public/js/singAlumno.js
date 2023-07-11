const $inputM = document.querySelector("#matricula");
const $inputC = document.querySelector("#correo");

$inputM.addEventListener("input", () => {
    $inputC.value = `${$inputM.value}@upq.edu.mx`;
});
