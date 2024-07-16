let correctas = [3, 1, 3, 2, 3];
let opcion_elegida = [];
let cantidad_correctas = 0;

function respuesta(num_pregunta, seleccionada){
    opcion_elegida[num_pregunta] = seleccionada.value;

    let id = "p" + num_pregunta;

    let labels = document.getElementById(id).childNodes;
    labels[3].style.backgroundColor = "white";
    labels[5].style.backgroundColor = "white";
    labels[7].style.backgroundColor = "white";

    seleccionada.parentNode.style.backgroundColor = "#cec0fc";
}

function corregir(){
    cantidad_correctas = 0;
    for (let i = 0; i < correctas.length; i++) {
        if (correctas[i] == opcion_elegida[i]) {
            cantidad_correctas++;
        }
    }
    document.getElementById("resultado").innerHTML = cantidad_correctas;

    if (cantidad_correctas === 5) {
        window.location.href = 'FELICITACIONES.html';
    } else if (cantidad_correctas >= 3) {
        window.location.href = 'Repaso.html';
    } else {
        window.location.href = 'Atencion.html';
    }
}
