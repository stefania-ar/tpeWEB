
document.addEventListener("DOMContentLoaded", function(){
    
    document.getElementById("formulario_coment").addEventListener("submit", function(e){
        e.preventDefault();
        insertComentario();
        getComentarios();
        console.log("hice el get");
    });

    getComentarios();
  //deleteComentario();

    
    let variable= document.getElementsByName("boton_borrar");
        console.log(variable);

        const URL="api/comentarios/";

        for (let i = 0; i < variable.length; i++) {
            console.log(variable);
            const element = variable[i].addEventListener('click',consola());
            
            
        }
        if(variable.click){
            consola();
        }


});

    

function getComentarios(){
    let ID= document.getElementById("id_peli").value;
    const URL= "api/comentarios/";

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

function deleteComentario(){
    let variable= document.getElementsByName("boton_borrar");
    console.log(variable);

    const URL="api/comentarios/";
    if(variable.onClick){
        consola();
    }

}

function consola(){
    alert("hola");
    console.log("delete");
}

function renderComentarios(comen) {
    //console.log(comen);
    let lista= document.getElementById("list_comentarios");
    lista.innerHTML ="";
     
    comen.forEach(com => {
        let comentario=`<div class="small_row"><li>${com.comentario}</li>`;
        let button= `<button name="boton_borrar" id="id_boton${com.id}">borrar</button>`;
        let puntuacion= `${com.puntuacion}`;
        lista.innerHTML+= comentario +"- Puntuacion: "+ puntuacion + button +`</div>`;

    });

}

    
function hola(){
    fetch(URL+parte, {
    method: 'DELETE',
    headers: {'Content-Type': 'application/json'}
})
.catch(error =>console.log(error));
}

console.log("final");

