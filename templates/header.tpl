<!doctype html>
    <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <base href="{BASE_URL}">
            <title>{$title_header}</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
            <link href="css/maincss.css" rel="stylesheet" type="text/css">
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>
        <header class="header">
            <ul class="botonera">
                <li class="boton_header">
                    <a href="home">INICIO</a>
                </li>
                <li class="boton_header">
                    <a href="showAll">PELICULAS</a>
                </li>
                <li class="boton_header">
                    <form action="logout" method="get">
                        {if $user eq true} 
                            <button type="submit">{$l}</button>
                        {else}
                        <button type="submit">{$li}</button>
                        {/if}
                    </form>
                </li>
            </ul>
        </header>
    <body>