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
                   <th>Imagen</th>
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
                    {if $pelicula->imagen != null}
                        <td><img src="{$pelicula->imagen}" alt="pelicula" srcset=""><button><a href="deleteImage/{$pelicula->id}">eliminar</a></button></td>
                    {else}
                        <td></td>
                    {/if}
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


    <form action="" method="post" class="column" id="formulario_coment">
        <label for="">Ingrese un comentario</label>
        <input type="text" placeholder="escriba su comentario" id="input_comentario" class="expand">
        <label for="">Ingrese su valoracion</label>
        <select name="input_puntuacion" id="input_puntuacion" class="select">
            <option value="1">UNO</option>
            <option value="2">DOS</option>
            <option value="3">TRES</option>
            <option value="4">CUATRO</option>
            <option value="5">CINCO</option>
        </select>
        {if $user != null}
            <input type="number" name="id_user" hidden value="{$user->id}" id="input_usuario">
        {/if}
        <input type="text" name="id_pelicula" hidden value="{$pelicula->id}" id="id_peli">
        <button type="submit">ENVIAR COMENTARIO</button>
    </form>



<script src="./js/renderComentarios.js"></script>    
{include file="footer.tpl"}        