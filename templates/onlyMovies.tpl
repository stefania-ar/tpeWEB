{include file="header.tpl"}
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
                    
                    {if $type eq true}
                        <td><button><a href="borrar/{$pelicula->id}"> {$eliminar}</a></button></td>
                        <td><button><a href="editar/{$pelicula->id}"> {$editar}</a></button></td>
                    {/if}
                        <td><button><a href="detalle/{$pelicula->id}"> {$detalle}</a></button></td>
                    
                        
                    
                </tr>
        {/foreach}
        </tbody>    
    </table>

{include file="button_home.tpl"}
{include file="footer.tpl"}        