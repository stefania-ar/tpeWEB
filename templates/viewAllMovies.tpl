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
                    <td><img src="{$pelicula->imagen}" alt="pelicula" class="imagenes">
                        {if $user!=null && $user->tipo_usuario==1}
                        <button><a href="deleteImage/{$pelicula->id}">eliminar</a></button></td>
                        {else}
                    </td>
                    {/if}
                    {else}
                    <td></td>
                    {/if}
                </tr>
                {/foreach}
            </tbody>    
        </table>     
    </section>
            
    <section class="container-detail">
        <section class="form-coment">

            <input type="text" name="id_pelicula" hidden value="{$pelicula->id}" id="id_peli">
            {if $user==null}
            <input type="text" name="usuario" hidden value="null" id="usuario">
            {else}
            <input type="text" name="usuario" hidden value="{$user->id}" id="usuario">
    
            {/if}
            
            
            <form action="" method="post" class="column" id="formulario_coment">
                {if $user != null}
                <label for="">Ingrese un comentario</label>
                <input type="text" placeholder="escriba su comentario" id="input_comentario" class="expand">
                <label for="">Su valoracion de este item es: <span id="id_span"> </span></label>
                <label for="">Ingrese su valoracion</label>
                <select name="input_puntuacion" id="input_puntuacion" class="select">
                    <option value="1">UNO</option>
                    <option value="2">DOS</option>
                    <option value="3">TRES</option>
                    <option value="4">CUATRO</option>
                    <option value="5">CINCO</option>
                </select>
                <input type="number" name="tipo" hidden value="{$user->tipo_usuario}" id="input_tipo">
                <input type="number" name="id_user" hidden value="{$user->id}" id="input_usuario">
                <button type="submit">ENVIAR COMENTARIO</button>
            </form>
            {/if}
        </section>
            
    <div class="apartado">
        <h1 class="apartado">{$com}</h1>
        
        <ul id="list_comentarios">
            
        </ul>
    </div>
    
</section>
<script src="./js/renderComentarios.js"></script>    
{include file="footer.tpl"}        