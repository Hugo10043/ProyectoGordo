"use strict";

let formulario = document.getElementById("form");

let titulo = document.getElementById("titulo");
let contenido = document.getElementById("contenido");
let imagen = document.getElementById("imagen");
let fecha = document.getElementById("fecha");


let fechaActual = new Date();

//padStart(2, "0") lo que hace es añadir el 0 adelnate del mes y el dia ya que el getMonth y getDate devuelven un solo digito si es posible

let fechaFormateada = `${fechaActual.getFullYear()}-${(fechaActual.getMonth() + 1).toString().padStart(2, "0")}-${(fechaActual.getDate() + 1).toString().padStart(2, "0")}`;

titulo.addEventListener("input",
    () => {
        validarTitulo();
    }
);

contenido.addEventListener("input",
    () => {
        validarContenido();
    }
);

imagen.addEventListener("change",
    () => {
        validarImagen();
    }
);

fecha.addEventListener("change",
    () => {
        validarFecha();
    }
);

formulario.addEventListener("submit",
    (event) => {
        let validaciones = [validarTitulo, validarContenido, validarImagen, validarFecha];
        for (let validar of validaciones) {
            if (!validar()) {
                event.preventDefault();
            }
        }
    }
);

const validarTitulo = () => {
    let valor = titulo.value.trim();
    let span_error = titulo.nextElementSibling;

    if (!(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "No puede estar vacio";
        return false;
    }

    if (valor.length < 3) {
        span_error.style.display = "inline";
        span_error.innerText = "El campo titulo debe tener mas de 3 caracteres.";
        return false;
    }

    span_error.style.display = "none";
    return true;
};

const validarContenido = () => {
    let valor = contenido.value.trim();
    let span_error = contenido.nextElementSibling;

    if (!(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "No puede estar vacio";
        return false;
    }

    if (valor.length < 3) {
        span_error.style.display = "inline";
        span_error.innerText = "El campo contenido debe tener mas de 3 caracteres.";
        return false;
    }

    span_error.style.display = "none";
    return true;
};

const validarImagen = () => {

    let span_error = imagen.nextElementSibling;
    let fichero;
    const tipos_admitidos = ["image/jpeg"]



    if (imagen.files.length > 0) {
        fichero = imagen.files[0];

        if (!tipos_admitidos.includes(fichero.type)) {
            span_error.style.display = "inline";
            span_error.innerText = "La imagen debe ser JPEG.";
            return false;
        }

        if (fichero.size > 5000000) {
            span_error.style.display = "inline";
            span_error.innerText = "La imagen debe ser menor a 5Mg.";
            return false;
        }
    } else {
        span_error.style.display = "inline";
        span_error.innerText = "Selecciona una imagen.";
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