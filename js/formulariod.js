const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{4,40}$/, // Letras y espacios, pueden llevar acentos.
	cp:/^\d{5}$/,
    estado:/^[a-zA-ZÀ-ÿ\s]{6,15}$/,
    municipio:/^[a-zA-ZÀ-ÿ\s]{6,30}$/,
    calle:/^[a-zA-ZÀ-ÿ0-9\s]{6,30}$/,
    ninterior:/^[a-zA-Z0-9\_\-]{2,5}$/,
    nexterior:/^[a-zA-Z0-9\_\-]{2,5}$/,
	telefono: /^\d{10,14}$/ // 10 a 14 numeros.
}

const campos = {
	nombre: false,
    cp:false,
	estado:false,
    municipio:false,
    calle:false,
    ninterior:false,
    nexterior:false,
	telefono: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "cp":
			validarCampo(expresiones.cp, e.target, 'cp');
		break;
        case "estado":
			validarCampo(expresiones.estado, e.target, 'estado');
		break;
        case "municipio":
			validarCampo(expresiones.municipio, e.target, 'municipio');
		break;
        case "calle":
			validarCampo(expresiones.calle, e.target, 'calle');
		break;
        case "ninterior":
			validarCampo(expresiones.ninterior, e.target, 'ninterior');
		break;
        case "nexterior":
			validarCampo(expresiones.nexterior, e.target, 'nexterior');
		break;
		case "telefono":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}



inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	const terminos = document.getElementById('terminos');
	if(campos.nombre && campos.cp && campos.estado && campos.municipio && campos.calle && campos.ninterior &&
        campos.nexterior && campos.telefono && terminos.checked ){
		formulario.reset();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
        
        setTimeout(() => {
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		}, 5000);
    }

});
