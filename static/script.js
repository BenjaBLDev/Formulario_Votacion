//OPCIONES DE VALIDACION CON JAVASCRIPT, QUEDAN COMENTADAS PARA QUE NO DEN PROBLEMAS CON LAS VALIDACIONES DE PHP.


/*
const form = document.getElementById('formulario');
const nombre = document.getElementById('nombre');
const alias = document.getElementById('alias');
const rut = document.getElementById('rut');
const email = document.getElementById('email');


function checkInputs() {
	const nombreValue = nombre.value.trim();
	const aliasValue = alias.value.trim();
	const rutValue = rut.value.trim();
	const emailValue = email.value.trim();

	if (nombreValue === '') {
		setErrorFor(nombre, 'Por favor ingrese su Nombre y Apellido.');
	} else {
		setSuccessFor(nombre);
	}

	if (aliasValue === '') {
		setErrorFor(alias, 'Por favor ingrese un alias.');
	} else {
		setSuccessFor(alias);
	}

	if (rutValue === '') {
		setErrorFor(rut, 'Por favor ingrese su rut.');
	} else {
		setSuccessFor(rut);
	}

	if (emailValue === '') {
		setErrorFor(email, 'Por favor ingrese su email');
	} else {
		setSuccessFor(email);
	}
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'formulario__voto error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'formulario__voto success';
}


form.addEventListener('submit', (e) => {

	checkInputs();
});
*/
