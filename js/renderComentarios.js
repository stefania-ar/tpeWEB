'use strict';

document.addEventListener("DOMContentLoaded", function(){
    getComentarios();
    console.log("hola");
    console.log(document.getElementsByTagName("button"));

    document.getElementById("formulario_coment").addEventListener("submit", function(e){
        e.preventDefault();
        insertComentario();
        getComentarios();
        console.log("hice el get");
    });

    document.getElementById("id_boton127").addEventListener("click", function(){
        deleteComentario();
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
        puntuacion: document.getElementById("input_puntuacion").value,
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
function deleteComentario(){
    const URL="api/comentarios/";
    let id_boton= document.getElementById("id_boton${com.id}");
    console.log(id_boton);

    
}

function renderComentarios(comen) {
    //console.log(comen);
    let lista= document.getElementById("list_comentarios");
    lista.innerHTML ="";
     
    comen.forEach(com => {
        let comentario=`<div class="small_row"><li>${com.comentario}</li>`;
        let button= `<button id="id_boton${com.id}">borrar</button></div>`;
        lista.innerHTML+= comentario + button;
        
        
    });
}
