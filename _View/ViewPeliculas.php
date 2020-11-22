<?php
require_once('libs/smarty/Smarty.class.php');

class ViewPeliculas{

    private $title;

    function __construct(){
        $this->title= "PELIS";
        $this->smarty = new Smarty();
    }

    function homeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function genresLocation(){
        header("Location: ".BASE_URL."showAllGenres");
    }

    function moviesLocation(){
        header("Location: ".BASE_URL."showAll");
    }

    function viewAllMovies($peliculas, $user){
        $this->smarty->assign('title_header', $this->title);
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('titulo', "Título");
        $this->smarty->assign('Anio', "Año");
        $this->smarty->assign('Pais', "País");
        $this->smarty->assign('Genero', "Género");
        $this->smarty->assign('Director_a', "Director/a");
        $this->smarty->assign('Calificacion', "Calificación");
        $this->smarty->assign('home', "HOME");
        $this->smarty->assign('com', "Comentarios");
        $this->smarty->assign('user', $user);


        $this->smarty->display('templates/viewAllMovies.tpl');
    }

    function onlyMovies($peliculas, $type, $user){
        $this->smarty->assign('title_header', $this->title);
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('titulo', "Título");
        $this->smarty->assign('Anio', "Año");
        $this->smarty->assign('Pais', "País");
        $this->smarty->assign('Genero', "Género");
        $this->smarty->assign('Director_a', "Director/a");
        $this->smarty->assign('Calificacion', "Calificación");
        $this->smarty->assign('eliminar', "Eliminar película");
        $this->smarty->assign('editar', "Editar");
        $this->smarty->assign('detalle', "Ver detalle");
        $this->smarty->assign('home', "HOME");
        $this->smarty->assign('type', $type);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('puntuaciones', array( "0" =>"SELECT",
                                                    "1" =>"UNO", 
                                                    "2" => "DOS", 
                                                    "3" => "TRES",
                                                    "4"=> "CUATRO",
                                                    "5"=> "CINCO"
                                                        ));

        $this->smarty->display('templates/onlyMovies.tpl');
    }
 
    function viewAllGenres($generos, $type){
        $this->smarty->assign('title_header', $this->title);
        $this->smarty->assign('titulo', "LISTA DE GENEROS");
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('eliminar', "Eliminar");
        $this->smarty->assign('editar', "Editar");
        $this->smarty->assign('G', "Generos");
        $this->smarty->assign('home', "HOME");
        $this->smarty->assign('type', $type);

        $this->smarty->display('templates/viewAllGenres.tpl');
    }

    function showHome($generos, $user, $type){
        $this->smarty->assign('title_header', $this->title);
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('titulo', "Filtrar/buscar peliculas por");
        $this->smarty->assign('titulo2', "Agregue un género");
        $this->smarty->assign('anio', "Año");
        $this->smarty->assign('pais', "País");
        $this->smarty->assign('direccion', "Director/a");
        $this->smarty->assign('Enviar', "Enviar");
        $this->smarty->assign('calif', "Calificacion");
        $this->smarty->assign('genero', "Género");
        $this->smarty->assign('l', "logout");
        $this->smarty->assign('li', "login");
        $this->smarty->assign('user', $user);
        $this->smarty->assign('type', $type);
        $this->smarty->assign('tituloH', "Agregue sus peliculas favoritas");

        $this->smarty->display('templates/home.tpl');
    }

    function showForm($id, $generos, $peliculas){
        $this->smarty->assign('title_header', $this->title);
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('titulo', "Filtrar/buscar peliculas por");
        $this->smarty->assign('titulo2', "Agregue un género");
        $this->smarty->assign('anio', "Año");
        $this->smarty->assign('pais', "País");
        $this->smarty->assign('direccion', "Director/a");
        $this->smarty->assign('Enviar', "Enviar");
        $this->smarty->assign('calif', "Calificacion");
        $this->smarty->assign('genero', "Género");
        $this->smarty->assign('BASE_URL', "'BASE_URL'");

        $this->smarty->display('templates/form_edit.tpl');
    }

    function showFormGenre($id_genero, $genero){
        $this->smarty->assign('genero', $genero);
        $this->smarty->assign('Enviar', "Enviar");
        $this->smarty->assign('title_header', $this->title);

        $this->smarty->display('templates/form_edit_genre.tpl');
    }

    function showcap($c){
        $this->smarty->assign('c', $c);
        $this->smarty->assign('Enviar', "Enviar");
        $this->smarty->assign('title_header', $this->title);

        $this->smarty->display('templates/num.tpl');
    }

    function showError($msj){
        $this->smarty->assign('title_header', "No se puede continuar");
        $this->smarty->assign('msj', $msj);
        $this->smarty->assign('home', "HOME");
        
        $this->smarty->display('./templates/showError.tpl');
    }

    function renderResults($peliculas){
        $this->smarty->assign('title_header', $this->title);
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('titulo', "Título");
        $this->smarty->assign('Anio', "Año");
        $this->smarty->assign('Pais', "País");
        $this->smarty->assign('Genero', "Género");
        $this->smarty->assign('Director_a', "Director/a");
        $this->smarty->assign('Calificacion', "Calificación");
        $this->smarty->assign('home', "HOME");

        $this->smarty->display('./templates/busquedas.tpl');
    }

}
