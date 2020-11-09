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
                   <th>Calificacion x usuario</th>
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
                    <td>
                        <form action="elegirCalif/{$pelicula->id}" method="post">
                            <select name="calificacion" id="">
                                <option value="1">UNO</option>
                                <option value="2">DOS</option>
                                <option value="3">TRES</option>
                                <option value="4">CUATRO</option>
                                <option value="5">CINCO</option>
                            </select>
                            <button type="submit">Enviar Calificacion</button>
                        </form>
                    </td>
                    {if $type eq true}
                        <td><button><a href="borrar/{$pelicula->id}"> {$eliminar}</a></button></td>
                        <td><button><a href="editar/{$pelicula->id}"> {$editar}</a></button></td>
                    {/if}
                        <td><button><a href="detalle/{$pelicula->id}"> {$detalle}</a></button></td>
                    {if $user eq true}
                        
                    {/if}
                </tr>
        {/foreach}
        </tbody>    
    </table>

{include file="button_home.tpl"}
{include file="footer.tpl"}        