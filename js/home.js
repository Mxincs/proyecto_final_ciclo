const carrusel = document.querySelector(".carrusel");
const btnIzq = document.querySelector(".flecha.izquierda");
const btnDer = document.querySelector(".flecha.derecha");

const visibles = 2;
const anchoCuadro = 370; // ancho + gap

let cuadros = Array.from(carrusel.children);
const totalOriginal = cuadros.length;

/* 🔁 CLONAR PRIMEROS Y ÚLTIMOS */
for (let i = 0; i < visibles; i++) {
    const clonFinal = cuadros[i].cloneNode(true);
    carrusel.appendChild(clonFinal);

    const clonInicio = cuadros[cuadros.length - 1 - i].cloneNode(true);
    carrusel.insertBefore(clonInicio, carrusel.firstChild);
}

cuadros = Array.from(carrusel.children);

let indice = visibles; // empezamos en las originales
moverCarrusel(false);

/* Función de movimiento */
function moverCarrusel(animar = true) {
    if (!animar) carrusel.style.transition = "none";
    else carrusel.style.transition = "transform 0.4s ease";

    carrusel.style.transform = `translateX(-${indice * anchoCuadro}px)`;
}

/* BOTÓN DERECHA */
btnDer.addEventListener("click", () => {
    indice++;
    moverCarrusel(true);
});

/* BOTÓN IZQUIERDA */
btnIzq.addEventListener("click", () => {
    indice--;
    moverCarrusel(true);
});

/* 🔄 REAJUSTE INVISIBLE */
carrusel.addEventListener("transitionend", () => {
    if (indice >= totalOriginal + visibles) {
        indice = visibles;
        moverCarrusel(false);
    }

    if (indice < visibles) {
        indice = totalOriginal + visibles - 1;
        moverCarrusel(false);
    }
});