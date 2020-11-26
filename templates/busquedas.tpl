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
                        <td><img src="{$pelicula->imagen}" alt="pelicula" class="imagenes" ></td>
                    {else}
                        <td></td>    
                    {/if}
                    
                </tr>
        {/foreach}
        </tbody>    
    </table>

{include file="footer.tpl"} 