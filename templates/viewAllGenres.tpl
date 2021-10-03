{include file="header.tpl"}
    <h1>{$titulo}</h1>
    
    <table>
           <thead>
               <tr>
                   <th>{$G}</th>
               </tr>
           </thead>
       <tbody>
        {foreach $generos as $genero} 
                <tr>
                    <td> {$genero->nombre} </td>
                    {if $type eq true}
                        <td><button><a href="borrar_genero/{$genero->id_genero}"> {$eliminar}</a></button></td>
                        <td><button><a href="editar_genero/{$genero->id_genero}"> {$editar}</a></button></td>
                    {/if}
                </tr>
        {/foreach}
        </tbody>    
    </table>

{include file="footer.tpl"}   