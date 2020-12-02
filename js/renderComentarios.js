document.addEventListener("DOMContentLoaded", function(){
    
    getComentarios();

    let usuario= document.getElementById("usuario").value;
    
    if(usuario != "null"){
        document.getElementById("formulario_coment").addEventListener("submit", function(e){
            e.preventDefault();
            insertComentario();
        });
            
    }
    
});    

function getComentarios(){
    let ID= document.getElementById("id_peli").value;
    const URL= "api/peliculas/"; 
    const recurso= "/comentarios";

    fetch(URL+ID+recurso)
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

    console.log("aca empieza el fetch");
    fetch('api/comentarios', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(comentario)
    }).then(response => {
        response.json()
        getComentarios();
    })
    .catch(error =>console.log(error));

}

function deleteComentario(id){
    let variable= document.getElementsByName("boton_borrar");
    let parte= id;
    const URL="api/comentarios/";
    
    fetch(URL+parte, {
        method: 'DELETE',
        headers: {'Content-Type': 'application/json'}
    })
    .then(response => {
        response.json()
        getComentarios();
    })
    .catch(error =>console.log(error));
    
}


function renderComentarios(comen) {
    let lista= document.getElementById("list_comentarios");
    lista.innerHTML ="";
    
    let usuario= document.getElementById("usuario").value;

    comen.forEach(com => {
        let comentario=`<div class="small_row"><li>${com.comentario}</li>`;
        let button= `<button name="boton_borrar" onclick="deleteComentario(${com.id})" id="id_boton${com.id}">borrar</button>`;
        let puntuacion= `${com.puntuacion}`;
        
        if(usuario != "null"){
            tipo_usuario= document.getElementById("input_tipo").value;
            if ( tipo_usuario==1) {
                lista.innerHTML+= comentario +"- Puntuacion dada: "+ puntuacion + button +`</div>`;
            }if (tipo_usuario==0) {
                lista.innerHTML+= comentario +"- Puntuacion dada: "+ puntuacion +`</div>`;
            }
        }else{
            lista.innerHTML+= comentario +"- Puntuacion dada: "+ puntuacion +`</div>`;
        } 
        });
    // }else{
    //     comen.forEach(com => {
    //         let comentario=`<div class="small_row"><li id="${com.id}">${com.comentario}</li>`;
    //         let puntuacion = `${com.puntuacion}`;
    //         lista.innerHTML+= comentario +"- Puntuacion dada: "+ puntuacion +`</div>`;
    //     });
    //}    

}



