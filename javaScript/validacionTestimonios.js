"use strict";

let formulario = document.getElementById("form");

let autor = document.getElementById("autor");
let contenido = document.getElementById("contenido");

autor.addEventListener("input",
    () => {
        validarAutor();
    }
);

contenido.addEventListener("input",
    () => {
        validarContenido();
    }
);

formulario.addEventListener("submit",
    (event) => {
        let validaciones = [validarAutor, validarContenido];
        for (let validar of validaciones) {
            if (!validar()) {
                event.preventDefault();
            }
        }
    }
);

const validarAutor = () => {
    let span_error = autor.nextElementSibling;


    if (autor.selectedIndex === 0) {
        span_error.style.display = "inline";
        span_error.innerText = "Debe seleccionar una opcion valida.";
        return false;
    }

    span_error.style.display = "none";
    return true;
};

const validarContenido = () => {
    let valor = contenido.value.trim();
    let span_error = contenido.nextElementSibling;


    if (valor.length < 1) {
        span_error.style.display = "inline";
        span_error.innerText = "El campo contenido no puede estar vacio.";
        return false;
    }

    span_error.style.display = "none";
    return true;
};