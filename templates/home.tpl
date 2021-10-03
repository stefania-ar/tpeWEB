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
                <option value="España">Corea del Sur</option>
                <option value="Inglaterra">Inglaterra</option>
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
        
        {if $user != null && $type ==true}
            <h2>{$titulo2}</h2>
            <form action="crearGenero" method="post">
                <label for="Categoria">{$genero}</label>
                <input class="cssGeneral" type="text" name="generoCrear">
                <button type="submit">{$Enviar}</button>
            </form>
        {/if}
        
        {if $user == null}
            <h1>Encontrá tus peliculas favoritas</h1>
            <section class="row">
                <img src="imagenes/chihiro.jpg" class="imagenes" alt="pelicula">
                <img src="imagenes/howls.jpg" alt="" class="imagenes">
                <img src="imagenes/viaje_al_centro_de_la_tierra.jpg" alt="" class="imagenes">
                <img src="imagenes/bolt.jpg" alt="" class="imagenes">
                <img src="imagenes/et.jpg" class="imagenes" alt="">
            </section>


        {/if}
            
        <h1>{$titulo}</h1>
            <section class="">
            <form action="selectByGenre" method="post" class="centrado">
                <label for="genero">{$genero}</label>
                <input type="text" hidden name="parametro" value="nombre">
                <select class="cssGeneral" name="valor" >
                    {foreach from =$generos item=genero} 
                    <option value={$genero->nombre}>{$genero->nombre}</option>
                    {/foreach}    
                </select>
                <button type="submit">{$Enviar}</button>
            </form>
            
            <form action="buscarPorNombre" method="post" class="centrado">
                <label for="nombre">Nombre</label>
                <input class="cssGeneral" type="text" name="valor">
                <input type="text" hidden name="parametro" value="titulo">
                <button type="submit">{$Enviar}</button>
            </form>
            
            <form action="buscarPorAnio" method="post" class="centrado">
                <label for="año">{$anio}</label>
                <input class="cssGeneral" type="number" name="valor">
                <input type="text" hidden name="parametro" value="anio">
                <button type="submit">{$Enviar}</button>
            </form>
            
            <form action="buscarPorPais" method="post" class="centrado">
                <label for="Pais">{$pais}</label>
                <input type="text" hidden name="parametro" value="pais">
                <select class="cssGeneral" name="valor" >
                    <option value="Argentina">Argentina</option>
                    <option value="Estados Unidos">Estados Unidos</option>
                    <option value="Chile">Chile</option>
                    <option value="Japon">Japon</option>
                    <option value="Canada">Canada</option>
                    <option value="España">España</option>
                    <option value="Inglaterra">Inglaterra</option>
                </select>
                <button type="submit">{$Enviar}</button>
            </form>
            
            <form action="buscarPorDireccion" method="post" class="centrado">
                <label for="Direccion">{$direccion}</label>
                <input class="cssGeneral" type="text" name="valor">
                <input type="text" hidden name="parametro" value="director_a">
                <button type="submit">{$Enviar}</button>
            </form>
            
            <form action="buscarPorCalificacion" method="post" class="centrado">
                <label for="Calificacion">{$calif}</label>
                <input class="cssGeneral" type="number" name="valor">
                <input type="text" hidden name="parametro" value="calificacion">
                <button type="submit">{$Enviar}</button>
            </form>
        </section>
            
            
    <h1>Búsqueda avanzada</h1>
    <form action="buscarAvanzado" method="post" class="formulario">
            <label for="nombre">Nombre</label>
            <input class="cssGeneral" type="text" name="nombrePelicula2">
            <label for="año">{$anio}</label>
            <input class="cssGeneral" type="number" name="anio2">
            <label for="año">{$pais}</label>
            <select class="cssGeneral" name="pais2" >
                <option selected value="Select">SELECT</option>
                <option value="Argentina">Argentina</option>
                <option value="Estados Unidos">Estados Unidos</option>
                <option value="Chile">Chile</option>
                <option value="Japon">Japon</option>
                <option value="Canada">Canada</option>
                <option value="España">España</option>
                <option value="Inglaterra">Inglaterra</option>
            </select>
            <label for="Direccion">{$direccion}</label>
            <input class="cssGeneral" type="text" name="direccion2">
            <label for="Calificacion">{$calif}</label>
            <input class="cssGeneral" type="number" name="calificacion2">
            <label for="genero">{$genero}</label>
            <select class="cssGeneral" name="genero2" >
                <option selected value="Select">SELECT</option>
                {foreach from =$generos item=genero} 
                    $pelicula->nombre;
                    <option value={$genero->nombre}>{$genero->nombre}</option>
                {/foreach}  
            </select>
            <button type="submit">{$Enviar}</button>
        </form>
</div>
        
{include file="footer.tpl"}        