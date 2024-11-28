"use strict";

let formulario = document.getElementById("form");

let descripcion = document.getElementById("descripcion");
let duracion = document.getElementById("duracion");
let precio = document.getElementById("precio");

descripcion.addEventListener("input",
    () => {
        validarDescripcion();
    }
);

duracion.addEventListener("input",
    () => {
        validarDuracion();
    }
);

precio.addEventListener("input",
    () => {
        validarPrecio();
    }
);

formulario.addEventListener("submit",
    (event) => {
        let validaciones = [validarDescripcion, validarDuracion, validarPrecio];
        for (let validar of validaciones) {
            if (!validar()) {
                event.preventDefault();
            }
        }
    }
);

const validarDescripcion = () => {
    let valor = descripcion.value.trim();
    let span_error = descripcion.nextElementSibling;

    if (!(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "No puede estar vacio";
        return false;
    }


    if (!/[A-Za-z]/.test(valor) || /[0-9]/.test(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "Solo puede contener letras.";
        return false;
    }

    if (valor.length < 5) {
        span_error.style.display = "inline";
        span_error.innerText = "El campo descripcion no puede tener menos de 5 caracteres.";
        return false;
    }

    if (valor.length > 50) {
        span_error.style.display = "inline";
        span_error.innerText = "El campo descripcion no puede tener mas de 50 caracteres.";
        return false;
    }

    span_error.style.display = "none";
    return true;
};

const validarDuracion = () => {
    let valor = duracion.value.trim();
    let span_error = duracion.nextElementSibling;

    if (!(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "No puede estar vacio";
        return false;
    }


    if (isNaN(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "No puede contener letras u otros caracteres.";
        return false;
    }

    if (parseInt(valor) < 15) {
        span_error.style.display = "inline";
        span_error.innerText = "La duracion no puede ser menos a 15.";
        return false;
    }

    span_error.style.display = "none";
    return true;
};

const validarPrecio = () => {
    let valor = precio.value.trim();
    let span_error = precio.nextElementSibling;

    if (!(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "No puede estar vacio";
        return false;
    }

    if (isNaN(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "No puede contener letras u otros caracteres.";
        return false;
    }

    if (parseInt(valor) < 0) {
        span_error.style.display = "inline";
        span_error.innerText = "La precio no puede ser negativo.";
        return false;
    }

    span_error.style.display = "none";
    return true;
};