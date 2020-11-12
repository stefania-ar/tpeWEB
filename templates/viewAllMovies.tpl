{include file="header.tpl"}
{include file="button_home.tpl"}
<section class="row">

    <table>
           <thead>
               <tr>
                   <th>{$titulo}</th>
                   <th>{$Anio}</th>
                   <th>{$Pais}</th>
                   <th>{$Director_a}</th>
                   <th>{$Calificacion}</th>
                   <th>{$Genero}</th>
               </tr>
           </thead>
       <tbody>
        {foreach $peliculas as $pelicula} 
                <tr>
                    <td>{$pelicula->titulo}</td>
                    <td>{$pelicula->anio}</td>
                    <td>{$pelicula->pais}</td>
                    <td>{$pelicula->director_a}</td>
                    <td>{$pelicula->calificacion}</td>
                    <td>{$pelicula->nombre}</td>
                </tr>
        {/foreach}
        </tbody>    
    </table>
    
    <div class="apartado">
        <h1 class="apartado">{$com}</h1>
    
        <ul id="list_comentarios">

        </ul>
    </div>
   
</section>

{if $user != null}
    <form action="" method="post" class="column" id="formulario_coment">
        <label for="">Ingrese un comentario</label>
        <input type="text" placeholder="escriba su comentario" id="input_comentario" class="expand">
        <label for="">Ingrese su valoracion</label>
        <select name="" id="" class="select">
            <option value="1">UNO</option>
            <option value="2">DOS</option>
            <option value="3">TRES</option>
            <option value="4">CUATRO</option>
            <option value="5">CINCO</option>
        </select>
        <input type="number" name="id_user" hidden value="{$user->id}" id="input_usuario">
        <input type="text" name="id_pelicula" hidden value="{$pelicula->id}" id="id_peli">
        <button type="submit">ENVIAR COMENTARIO</button>
    </form>
{/if}


<script src="./js/renderComentarios.js"></script>    
{include file="footer.tpl"}        