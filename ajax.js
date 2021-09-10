"use strict";

let formCalc = document.querySelector("#form-area");
let container = document.querySelector("#container");
formCalc.addEventListener('submit', enviarDatos);

async function enviarDatos(e){
    e.preventDefault();
    let formData = new FormData(this); 
    let area = formData.get('area');


    let url = "filtradoo" + "/" + area;
    let response = await fetch(url);
    let html = await response.text();

    container.innerHTML = "Resultado es:" + html;

}

