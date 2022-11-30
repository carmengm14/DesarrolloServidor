//calculadora

var nombre = prompt("Para una experiencia aún más personalizada, escribe tu nombre a continuación, gracias (Opcional)");
//validar numeros
window.onload = function () {
   
   document.getElementById("peso").onkeypress = validarFormulario;
   document.getElementById("edad").onkeypress = validarFormulario;
   document.getElementById("altura").onkeypress = validarFormulario;

    
    var parrafo = document.createElement("p");
    var texto = document.createTextNode("GRACIAS " + nombre + " POR USAR LA CALCULADORA DE GYM Y JAM\n");
    parrafo.appendChild(texto);
    if (nombre != "") {
        document.getElementById('calculadora').appendChild(parrafo);
    }
}
   

    function validarFormulario(event) {
        var elemento = event;
        var elementoParseado = parseInt(String.fromCharCode(elemento.charCode));
        if (elementoParseado >= 0 && elementoParseado <= 9 ) {
        
        }
        else {
        elemento.preventDefault();
            alert("CARÁCTER NO PERMITIDO")
        }
    }

    function operacion(peso, edad, altura){
        var operacion = 655 + (peso * 9.6) + (1.8 * altura) - (4.7 * edad);
        document.getElementById("basal").value = operacion.toFixed(2);
    }

    function calcular(peso, edad, altura){
        var operacion = document.getElementById("basal").value;
        if (document.getElementById("act-poco").checked) {
            var resultado = operacion * 1.2;
            document.getElementById("total").value = resultado.toFixed(2);
        }else if(document.getElementById("act-ligero").checked){
            var resultado = operacion * 1.375;
            document.getElementById("total").value = resultado.toFixed(2);
        }else if(document.getElementById("act-moderada").checked){
            var resultado = operacion * 1.55;
            document.getElementById("total").value = resultado.toFixed(2);
        }else if(document.getElementById("act-intensa").checked){
            var resultado = operacion * 1.725;
            document.getElementById("total").value = resultado.toFixed(2);
        }else{
            document.getElementById("total").value = "valor no permitido";
        }
    }

    function macros() {
        var totales = document.getElementById("total").value;
        proteinas = (totales*0.4)/4;
        document.getElementById("proteinas").value = proteinas.toFixed(2);

        carbohidratos = (totales*0.3)/4;
        document.getElementById("carbohidratos").value = carbohidratos.toFixed(2);

        grasas = (totales*0.3)/9;
        document.getElementById("grasas").value = grasas.toFixed(2);

    }

    function dietas() {
        var totales = parseInt(document.getElementById("total").value);

        var definicion = totales - 300;
        document.getElementById("definicion").value = definicion.toFixed(2);
       
        var mantenimiento = totales;
        document.getElementById("mantenimiento").value = mantenimiento;

        var volumen = (totales + 500);
        document.getElementById("volumen").value = volumen;
        
       
        
    }

    function borrarSeleccion(){
        document.querySelectorAll('[name=act]').forEach((x) => x.checked = false);
    }