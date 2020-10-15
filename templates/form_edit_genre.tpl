{include file="header.tpl"}


    <form action="editarGeneroDesdeForm/{$genero->id_genero}" method="post">
        <input type="text" name="genreName" value="{$genero->nombre}">
        <button type="submit">{$Enviar}</button>
    </form>



{include file="footer.tpl"}      