{include file="header.tpl"}

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
                    <td>{$user->tipo_usuario}</td>
                </tr>
        {/foreach}
        </tbody>    
    </table>



{include file="footer.tpl"}   