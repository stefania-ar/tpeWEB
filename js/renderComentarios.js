'use strict';

document.addEventListener("DOMContentLoaded", function(){
    getComentarios();
    console.log("hola");

    document.getElementById("formulario_coment").addEventListener("submit", function(e){
        e.preventDefault();
        insertComentario();
        getComentarios();
        console.log("hice el get");
    });
});

function getComentarios(){
    let ID= document.getElementById("id_peli").value;
    const URL= "api/comentarios/";
    console.log("hola");

    fetch(URL+ID)
    .then(response => response.json())
    .then(comentarios=> renderComentarios(comentarios))
    .catch(error =>console.log(error));
}



function insertComentario(){
    console.log("hizo el comen")
    let comentario={
        comentario: document.getElementById("input_comentario").value,
        id_usuario: document.getElementById("input_usuario").value,
        id_pelicula: document.getElementById("id_peli").value

    }

    fetch('api/comentarios', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(comentario)
    })
    .catch(error =>console.log(error));

}

function renderComentarios(comen) {
    //console.log(comen);
    let lista= document.getElementById("list_comentarios");
    lista.innerHTML ="";
    comen.forEach(com => {
        lista.innerHTML+= `<li>${com.comentario}</li>`;
        
        
    });
}
