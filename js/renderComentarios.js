
document.addEventListener("DOMContentLoaded", function(){
    
    document.getElementById("formulario_coment").addEventListener("submit", function(e){
        e.preventDefault();
        insertComentario();
        getComentarios();
        console.log("hice el get");
    });

    getComentarios();
});    

function getComentarios(){
    let ID= document.getElementById("id_peli").value;
    const URL= "api/comentarios/";

    fetch(URL+ID)
    .then(response => response.json())
    .then(comentarios=> renderComentarios(comentarios))
    .catch(error =>console.log(error));
}

function getComentario(){
    let ID= document.getElementById("id_peli").value;
    
    const URL= "api/comentario/";

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

    
    getComentarios();
}

function deleteComentario(id){
    let variable= document.getElementsByName("boton_borrar");
    console.log(variable);
    let parte= id;
    const URL="api/comentarios/";
    
    fetch(URL+parte, {
        method: 'DELETE',
        headers: {'Content-Type': 'application/json'}
    })
    .catch(error =>console.log(error));

    getComentarios();
    getComentarios();
}


function renderComentarios(comen) {
    //console.log(comen);
    let lista= document.getElementById("list_comentarios");
    lista.innerHTML ="";
    
    comen.forEach(com => {
        let comentario=`<div class="small_row"><li id="${com.id}">${com.comentario}</li>`;
        let button= `<button name="boton_borrar" onclick="deleteComentario(${com.id})" id="id_boton${com.id}">borrar</button>`;
        let puntuacion= `${com.puntuacion}`;
        lista.innerHTML+= comentario +"- Puntuacion dada: "+ puntuacion + button +`</div>`;
        document.getElementById("id_span").innerHTML = puntuacion;
    });

}



