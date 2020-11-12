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
        <input type="text" placeholder="escriba su comentario" id="input_comentario" class="expand">
        <input type="number" name="id_user" hidden value="{$user->id}">
        <input type="text" name="id_pelicula" hidden value="{$pelicula->id}">
        <button type="submit">ENVIAR COMENTARIO</button>
    </form>
{/if}


<script src="./js/renderComentarios.js"></script>    
{include file="footer.tpl"}        