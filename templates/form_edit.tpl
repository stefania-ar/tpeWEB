{include file="header.tpl"}

    {foreach $peliculas as $pelicula}

        <form action="editarDesdeForm/{$pelicula->id}" method="post">
            <input type="text" name="title" placeholder="inserte titulo" value="{$pelicula->titulo}">
            <input type="number" name="anio" placeholder="inserte año" value="{$pelicula->anio}">
    {/foreach}
        
        <select name="pais" >
        {foreach $peliculas as $pelicula}
            {if ($pelicula->pais) eq ($pelicula->pais)}
                <option value="{$pelicula->pais}" selected="{$pelicula->pais}">{$pelicula->pais}</option>
            {/if}
        {/foreach}
            <option value="Argentina">Argentina</option>
            <option value="Estados Unidos">Estados Unidos</option>
            <option value="Chile">Chile</option>
            <option value="Japon">Japon</option>
            <option value="Canada">Canada</option>
            <option value="España">España</option>
        </select>
        {foreach $peliculas as $pelicula} 
            <input type="text" name="director_a" placeholder="inserte director/a" value="{$pelicula->director_a}">
        
            <input type="number" name="calif" placeholder="inserte calficacion" value="{$pelicula->calificacion}">
        {/foreach}

        <select name="genero" >
            {foreach $generos as $genero} 
                {if ($genero->id_genero) eq ($pelicula->id_genero)}
                    <option value="{$genero->id_genero}" selected="{$genero->nombre}">{$genero->nombre}</option>
                {/if} 
                <option value={$genero->id_genero}>{$genero->nombre}</option>
            {/foreach}
            </select>
        <button type="submit">{$Enviar}</button>
    </form>



{include file="footer.tpl"}   