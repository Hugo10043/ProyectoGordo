"use strict";

let formulario = document.getElementById("form");

let socio = document.getElementById("socio");
let servicio = document.getElementById("servicio");
let fecha = document.getElementById("fecha");
let hora = document.getElementById("hora");


let fechaActual = new Date();

let fechaFormateada = `${fechaActual.getFullYear()}-${(fechaActual.getMonth() + 1).toString().padStart(2, "0")}-${(fechaActual.getDate() + 1).toString().padStart(2, "0")}`;



socio.addEventListener("input",
    () => {
        validarSocio();
    }
);

servicio.addEventListener("input",
    () => {
        validarServicio();
    }
);

fecha.addEventListener("change",
    () => {
        validarFecha();
    }
);

hora.addEventListener("change",
    () => {
        validarHora();
    }
);

formulario.addEventListener("submit",
    (event) => {
        let validaciones = [validarSocio, validarServicio, validarFecha, validarHora];
        for (let validar of validaciones) {
            if (!validar()) {
                event.preventDefault();
            }
        }
    }
);

const validarSocio = () => {
    let span_error = socio.nextElementSibling;

    if (socio.selectedIndex === 0) {
        span_error.style.display = "inline";
        span_error.innerText = "Debe seleccionar una opcion valida.";
        return false;
    }

    span_error.style.display = "none";
    return true;
};

const validarServicio = () => {
    let span_error = servicio.nextElementSibling;


    if (servicio.selectedIndex === 0) {
        span_error.style.display = "inline";
        span_error.innerText = "Debe seleccionar una opcion valida.";
        return false;
    }

    span_error.style.display = "none";
    return true;
};

const validarFecha = () => {

    let valor = fecha.value.trim();
    let span_error = fecha.nextElementSibling;

    if (!(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "No puede estar vacio";
        return false;
    }

    if (valor < fechaFormateada) {
        span_error.style.display = "inline";
        span_error.innerText = "La fecha tiene que ser posterior a hoy";
        return false;
    }

    span_error.style.display = "none";
    return true;

};

const validarHora = () => {

    let valor = hora.value.trim();
    let span_error = hora.nextElementSibling;

    if (!(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "No puede estar vacio";
        return false;
    }

    span_error.style.display = "none";
    return true;

};