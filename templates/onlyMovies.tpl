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
                    {if $user eq true}
                        <th>Calificacion x usuario</th>
                    {/if}
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
                    {if $user eq true}
                    <td>
                        <form action="elegirCalif/{$pelicula->id}" method="post">
                        
                            <select name="score" id="">
                                 
                                {foreach $scores as $score}
                                    
                                    {for $i=0 to 5}
                                        {if ($score->puntuacion) eq $i && $score->id_pelicula eq $pelicula->id}  
                                            <option value="{$score->puntuacion}" selected="{$score->puntuacion}">{$puntuaciones.$i}</option>  
                                        {/if}                       
                                        <option value={$i}>{$puntuaciones.$i}</option>
                                    {/for}
                                {/foreach}    
                                
                            </select>
                            <button type="submit">Enviar Calificacion</button>
                        
                        </form>
                    </td>
                    {/if}
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