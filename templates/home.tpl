{include file="header.tpl"}
{include file="button_logout.tpl"}

<h1>{$tituloH}</h1>

        <form action="insert" method="post" enctype="multipart/form-data">
        <input class="cssGeneral" type="text" name="title" placeholder="inserte titulo">
            <input class="cssGeneral" type="number" name="anio" placeholder="inserte año">
            <select class="cssGeneral" name="pais" >
                <option value="Argentina">Argentina</option>
                <option value="Estados Unidos">Estados Unidos</option>
                <option value="Chile">Chile</option>
                <option value="Japon">Japon</option>
                <option value="Canada">Canada</option>
                <option value="España">España</option>
            </select>
            <input class="cssGeneral" type="text" name="director_a" placeholder="inserte director/a">
            <input class="cssGeneral" type="number" name="calif" placeholder="inserte calficacion">
            <select class="cssGeneral" name="genero" >
                {foreach $generos as $genero} 
                    $genero->nombre;
                    <option value={$genero->id_genero}>{$genero->nombre}</option>
                {/foreach}
                </select>
            <input class="cssGeneral" type="file" name="input_img" id="imageToUpload">
            <button type="submit">{$Enviar}</button>
        </form>

        <button><a href="showAll" >MOSTRAR TODAS LAS PELIS</a></button>
        <button><a href="showAllGenres" >MOSTRAR TODOS LOS GÉNEROS</a></button>
        {if $type eq true}
            <button><a href="showAllUsers" >MOSTRAR LISTA USUARIOS</a></button>
        {/if}
        

        <h2>{$titulo2}</h2>
        <form action="crearGenero" method="post">
            <label for="Categoria">{$genero}</label>
            <input class="cssGeneral" type="text" name="generoCrear">
            <button type="submit">{$Enviar}</button>
        </form>
        
        <h1>{$titulo}</h1>
        <form action="selectByGenre" method="post">
            <label for="genero">{$genero}</label>
            <select class="cssGeneral" name="genero2" >
            {foreach from =$generos item=genero} 
                $pelicula->nombre;
                <option value={$genero->nombre}>{$genero->nombre}</option>
            {/foreach}    
            </select>
        <button type="submit">{$Enviar}</button>
        </form>

        <form action="buscarPorNombre" method="post">
            <label for="nombre">Nombre</label>
            <input class="cssGeneral" type="text" name="nombrePelicula">
            <button type="submit">{$Enviar}</button>
        </form>

        <form action="buscarPorAnio" method="post">
            <label for="año">{$anio}</label>
            <input class="cssGeneral" type="number" name="anio">
            <button type="submit">{$Enviar}</button>
        </form>

        <form action="buscarPorPais" method="post">
            <label for="Pais">{$pais}</label>
            <select class="cssGeneral" name="pais2" >
                <option value="Argentina">Argentina</option>
                <option value="Estados Unidos">Estados Unidos</option>
                <option value="Chile">Chile</option>
                <option value="Japon">Japon</option>
                <option value="Canada">Canada</option>
                <option value="España">España</option>
            </select>
            <button type="submit">{$Enviar}</button>
        </form>

        <form action="buscarPorDireccion" method="post">
            <label for="Direccion">{$direccion}</label>
            <input class="cssGeneral" type="text" name="direccion">
            <button type="submit">{$Enviar}</button>
        </form>

        <form action="buscarPorCalificacion" method="post">
            <label for="Calificacion">{$calif}</label>
            <input class="cssGeneral" type="number" name="calificacion">
            <button type="submit">{$Enviar}</button>
        </form>
    </div>
{include file="footer.tpl"}        