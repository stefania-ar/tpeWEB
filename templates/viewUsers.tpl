{include file="header.tpl"}

<div class="margin">
<h1>{$titulo}</h1>

    <table>
        <thead>
                <tr>
                    <th>{$user}</th>
                    <th>{$tipo}</th>
                </tr>
            </thead>
        <tbody>
        {foreach $users as $user} 
                <tr>
                    <td>{$user->username}</td>
                    {if $user->tipo_usuario eq 1}
                        <td>{$admin}</td>
                    {/if}
                    {if $user->tipo_usuario eq 0}
                        <td>{$comun}</td>
                    {/if}
                    <td><button><a href="cambiarPermisos/{$user->id}"> {$permiso}</a></button></td>
                </tr>
        {/foreach}
        </tbody>    
    </table>
</div>


{include file="button_home.tpl"}
{include file="footer.tpl"}   