const img = document.getElementById("close");
const alert = document.querySelector(".alerta-errs");

img.addEventListener("click", () => {
    alert.style.display = "none";
});
