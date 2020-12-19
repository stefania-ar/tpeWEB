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
        let imag= `<div class="comments"><div class="user_img"> <img src="imagenes/user_image.jpg" alt="user image" class="mini-image"> </div>`
        let comentario=`<li class="li-comment">${com.comentario}</li>`;
        let puntuacion= `<div class="li-punt"> Puntuacion dada: ${com.puntuacion}</div>`;
        let button= `<div  class="boton_borrar"><button onclick="deleteComentario(${com.id})" id="id_boton${com.id}">borrar</button></div>`;
        
        if(usuario != "null"){
            tipo_usuario= document.getElementById("input_tipo").value;
            if ( tipo_usuario==1) {
                lista.innerHTML+=imag+ comentario + puntuacion + button +`</div>`;
            }if (tipo_usuario==0) {
                lista.innerHTML+= imag+ comentario + puntuacion +`</div>`;
            }
        }else{
            lista.innerHTML+=imag+ comentario + puntuacion +`</div>`;
        } 
    });
}



