/*************************************************************************** */
// Capturando el DIV alerta y mensaje
let alerta = document.getElementById("alerta");
let mensaje = document.getElementById("mensaje");
let campos = document.getElementById("nombre")



/*************************************************************************** */
// funcion para permitir sólo números y letra K en el imput
function isNumber(evt) {
  let charCode = evt.which;
  if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode === 75) {
    return false;
  }
  return true;
}
/*************************************************************************** */





function checkRut(rut) {

  if (rut.value.length <= 1) {


    alerta.classList.remove('alert-success', 'alert-danger');
    alerta.classList.add('alert-info');

    mensaje.innerHTML = 'Ingrese un RUT en el siguiente campo de texto para validar si es correcto o no';
  }

  /*************************************************************************** */
  // Obtiene el valor ingresado quitando puntos y guión.
  let valor = clean(rut.value);
  /*************************************************************************** */
  // Divide el valor ingresado en dígito verificador y resto del RUT.
  let bodyRut = valor.slice(0, -1);
  let dv = valor.slice(-1).toUpperCase();
  /*************************************************************************** */
  // Separa con un Guión el cuerpo del dígito verificador.
  rut.value = format(rut.value);
  /*************************************************************************** */
  // Si no cumple con el mínimo ej. (n.nnn.nnn)
  if (bodyRut.length < 7) {
    
    rut.setCustomValidity("RUT Incompleto");
    alerta.classList.remove('alert-success', 'alert-danger');
    alerta.classList.add('alert-info');
    mensaje.innerHTML = 'El Rut es muy corto';
    return false;
  }
  /*************************************************************************** */
  // Calcular Dígito Verificador "Método del Módulo 11"
  suma = 0;
  multiplo = 2;
  /*************************************************************************** */
  // Para cada dígito del Cuerpo
  for (i = 1; i <= bodyRut.length; i++) {
    /*************************************************************************** */
    // Obtener su Producto con el Múltiplo Correspondiente
    index = multiplo * valor.charAt(bodyRut.length - i);
    /*************************************************************************** */
    // Sumar al Contador General
    suma = suma + index;

    // Consolidar Múltiplo dentro del rango [2,7]
    if (multiplo < 7) {
      multiplo = multiplo + 1;
    } else {
      multiplo = 2;
    }
  }

  // Calcular Dígito Verificador en base al Módulo 11
  dvEsperado = 11 - (suma % 11);

  // Casos Especiales (0 y K)
  dv = dv == "K" ? 10 : dv;
  dv = dv == 0 ? 11 : dv;

  // Validar que el Cuerpo coincide con su Dígito Verificador
  if (dvEsperado != dv) {
    rut.setCustomValidity("RUT Inválido");

    alerta.classList.remove('alert-info', 'alert-success');
    alerta.classList.add('alert-danger');
    mensaje.innerHTML = 'El RUT ingresado es <strong>INCORRECTO</strong> reintente.';

    return false;
  } else {
    rut.setCustomValidity("RUT Válido");

    alerta.classList.remove('d-none', 'alert-danger');
    alerta.classList.add('alert-success');
    //mensaje.innerHTML = 'El RUT ingresado: ' + rut.value + ' Es <strong>CORRECTO</strong>.';
    mensaje.innerHTML = ' ';
    
    return true;
  }
}

/*************************************************************************** */
//funcion separador de rut cadena 
function format (rut) {
  rut = clean(rut)

  var result = rut.slice(-4, -1) + '-' + rut.substr(rut.length - 1)
  for (var i = 4; i < rut.length; i += 3) {
    result = rut.slice(-3 - i, -i) + '.' + result
  }

  return result;
}

/*************************************************************************** */
//funcion valida ingreso los digitos permitidos
function clean (rut) {
  return typeof rut === 'string'
    ? rut.replace(/^0+|[^0-9kK]+/g, '').toUpperCase()
    : ''
}