"use strict";

let formCalc = document.querySelector("#form-area");
let containerArea = document.querySelector("#area");
formCalc.addEventListener('submit', enviarDatos);

async function enviarDatos(e){
    e.preventDefault();
    let formData = new FormData(this); 
    let area = formData.get('area');


    let url = `filtrado/${area}`; 
    console.log(url);
    let response = await fetch(url);
    let html = await response.text();

    containerArea.innerHTML = "Area es:" + html;

}

