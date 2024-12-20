"use strict";

let formulario = document.getElementById("form");

let nombre = document.getElementById("nombre");
let edad = document.getElementById("edad");
let usuario = document.getElementById("usuario");
let contraseña = document.getElementById("contraseña");
let telefono = document.getElementById("telefono");
let foto = document.getElementById("foto");

nombre.addEventListener("input",
    () => {
        validarNombre();
    }
);

edad.addEventListener("input",
    () => {
        validarEdad();
    }
);

usuario.addEventListener("input",
    () => {
        validarUsuario();
    }
);

contraseña.addEventListener("input",
    () => {
        validarContraseña();
    }
);

telefono.addEventListener("input",
    () => {
        validarTelefono();
    }
);

foto.addEventListener("change",
    () => {
        validarFoto();
    }
);

formulario.addEventListener("submit",
    (event) => {
        let validaciones = [validarNombre, validarEdad, validarUsuario, validarContraseña, validarTelefono, validarFoto];
        for (let validar of validaciones) {
            if (!validar()) {
                event.preventDefault();
            }
        }
    }
);

const validarNombre = () => {
    let valor = nombre.value.trim();
    let span_error = nombre.nextElementSibling;

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


    if (valor.length < 4) {
        span_error.style.display = "inline";
        span_error.innerText = "El campo nombre no puede tener menos de 4 caracteres.";
        return false;
    }

    if (valor.length > 50) {
        span_error.style.display = "inline";
        span_error.innerText = "El campo nombre no puede tener mas de 50 caracteres.";
        return false;
    }

    span_error.style.display = "none";
    return true;
};

const validarEdad = () => {
    let valor = edad.value.trim();
    let span_error = edad.nextElementSibling;

    if (isNaN(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "No puede contener letras u otros caracteres.";
        return false;
    }

    if (!(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "No puede estar vacio";
        return false;
    }

    if (parseInt(valor) < 18) {
        span_error.style.display = "inline";
        span_error.innerText = "La edad no puede ser menor que 18.";
        return false;
    }

    span_error.style.display = "none";
    return true;
};

const validarUsuario = () => {
    let valor = usuario.value.trim();
    let span_error = usuario.nextElementSibling;

    if (!(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "No puede estar vacio";
        return false;
    }

    if (!/^[A-Za-z]/.test(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "Debe de empezar por letra.";
        return false;
    }

    if (!/^[A-Za-z0-9]+$/.test(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "Solo puede contener letras o numeros.";
        return false;
    }

    if (valor.length < 5) {
        span_error.style.display = "inline";
        span_error.innerText = "El campo usuario no puede tener menos de 5 caracteres.";
        return false;
    }

    if (valor.length > 20) {
        span_error.style.display = "inline";
        span_error.innerText = "El campo usuario no puede tener mas de 20 caracteres.";
        return false;
    }

    span_error.style.display = "none";
    return true;
};

const validarContraseña = () => {
    let valor = contraseña.value.trim();
    let span_error = contraseña.nextElementSibling;

    if (!(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "No puede estar vacio";
        return false;
    }


    if (!/^[A-Za-z]/.test(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "Debe de empezar por letra.";
        return false;
    }

    if (!/^[A-Za-z0-9_]+$/.test(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "Solo puede contener letras o numeros o guiones bajos.";
        return false;
    }

    if (valor.length < 8) {
        span_error.style.display = "inline";
        span_error.innerText = "El campo contraseña no puede tener menos de 8 caracteres.";
        return false;
    }

    if (valor.length > 16) {
        span_error.style.display = "inline";
        span_error.innerText = "El campo contraseña no puede tener mas de 16 caracteres.";
        return false;
    }

    span_error.style.display = "none";
    return true;
};

const validarTelefono = () => {
    let valor = telefono.value.trim();
    let span_error = telefono.nextElementSibling;

    if (!(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "No puede estar vacio";
        return false;
    }


    if (!/^\+34/.test(valor)) {
        span_error.style.display = "inline";
        span_error.innerText = "Debe de empezar por +34.";
        return false;
    }

    let numeros = valor.slice(3); //Le quito los primeros 3 caracteres para que no los tenga en cuenta


    if (!/^[0-9]{9}$/.test(numeros)) {
        span_error.style.display = "inline";
        span_error.innerText = "Debe de tener 9 digitos.";
        return false;
    }

    span_error.style.display = "none";
    return true;
};

const validarFoto = () => {

    let span_error = foto.nextElementSibling;
    let fichero;
    const tipos_admitidos = ["image/jpeg"]




    if (foto.files.length > 0) {
        fichero = foto.files[0];

        if (!tipos_admitidos.includes(fichero.type)) {
            span_error.style.display = "inline";
            span_error.innerText = "La foto debe ser JPEG.";
            return false;
        }

        if (fichero.size > 5000000) {
            span_error.style.display = "inline";
            span_error.innerText = "La foto debe ser menor a 5Mg.";
            return false;
        }
    } else {
        span_error.style.display = "inline";
        span_error.innerText = "Selecciona una foto.";
        return false;
    }
    span_error.style.display = "none";
    return true;
};