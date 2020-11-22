<?php

require_once './_Model/ModelPeliculas.php';
require_once './_View/ViewPeliculas.php';
require_once './_View/ViewUser.php';
require_once './_Model/ModelUser.php';
require_once './_Model/ModelGeneros.php';
require_once './helpers/auth.php';

class ControllerPeliculas{

    private $model;
    private $view;
    private $viewUser;
    private $modelUser;
    private $modelGeneros;
    private $helper;

    function __construct(){
        $this->model= new ModelPeliculas();
        $this->view= new ViewPeliculas();
        $this->viewUser= new ViewUser();
        $this->modelUser= new ModelUser();
        $this->modelGeneros= new ModelGeneros();
        $this->helper= new helper();
    }

    function home (){
        $generos=$this->modelGeneros->selectAllGenres();
        
        $user=$this->checkUser();
        $type=$this->checkType();
        
        $this->view->showHome($generos, $user, $type);
    }

    private function checkUser(){
        session_start();
        if(isset($_SESSION['USER'])){
            return true;
        }else return false;
    }

    private function checkType(){
        if(session_status()== PHP_SESSION_NONE){
            session_start();
        }
        if(isset($_SESSION['TYPE']) && ($_SESSION['TYPE'] == 1)){
            return true;
        }else return false;
    }

    private function checkLogin(){
        session_start();

        if(!isset($_SESSION['TYPE'])){
            $this->viewUser->render_login();
                die();
        }else if ( (isset($_SESSION['TYPE'])) && ($_SESSION['TYPE']!=1) ) {#es distinto de 1 porque si lo pongo igual no sé a donde llevarlo
                $this->viewUser->render_login();                            #porque viene de muchos lugares
                die();
            
        }
        
    }

    function insert(){
        $this->checkLogin();

        $genre=$_POST['genero'];
        if(isset($_POST['title']) && ($_POST['title'] !=null)&&
            ($_POST['anio']) && ($_POST['pais']) && ($_POST['director_a']) && ($_POST['calif']) && ($genre) ){

                if($_FILES['input_img']['type'] == "image/jpg" || $_FILES['input_img']['type'] == "image/jpeg" || 
                $_FILES['input_img']['type'] == "image/png" ) {
                    $this->model->insert($_POST['title'],$_POST['anio'],$_POST['pais'],
                        $_POST['director_a'],$_POST['calif'],$genre,$_FILES['input_img']['tmp_name']);
                    $this->view->homeLocation();
                }else{
                    $this->model->insert($_POST['title'],$_POST['anio'],$_POST['pais'],
                        $_POST['director_a'],$_POST['calif'],$genre);
                    $this->view->homeLocation();
                }
                
             
               
        } else $this->view->showError("Complete los campos para continuar");
        
    }
     
    function viewAllMovies(){
        $peliculas=$this->model->selectAllTable();
        $type=$this->checkType();

        if(isset($_SESSION['USER'])){
            $user=$_SESSION['USER'];
            $userDB=$this->modelUser->getUser($user);

            $idUSER=$userDB->id;
        
            $this->view->onlyMovies($peliculas, $type, $user);
        }else {
            $user=null;
            $type=null;
            $scores=null;
            $this->view->onlyMovies($peliculas, $type, $user);
        }
        
        
        
    }
    
    function viewAllGenres(){
        $type=$this->checkType();
        $generos=$this->modelGeneros->selectAllGenres();
        $this->view->viewAllGenres($generos, $type);
    }

    function viewByGenre(){
        $genre= $_POST['genero2'];

        if(isset($genre)){
            $peliculas=$this->model->selectByGenre($genre);
            $this->view->viewAllMovies($peliculas);
        }
        
    }

    function searchByName(){
        $titulo= $_POST['nombrePelicula'];
        $parametro= $_POST['parametro_nombre'];
        $peliculas=$this->model->search($parametro, $titulo);
        $this->view->renderResults($peliculas);
    }

    function searchByYear(){
        $anio= $_POST['anio'];

        if(isset($anio)){
            $peliculas=$this->model->returnYear($anio);
            $this->view->renderResults($peliculas);
        }
    }

    function searchByCountry(){
        $pais= $_POST['pais2'];

        if(isset($pais)){
            $peliculas=$this->model->returnCountry($pais);
            $this->view->renderResults($peliculas);
        }
    }

    function searchByDirection(){
        $direccion = $_POST['direccion'];

        if(isset($direccion)){
            $peliculas=$this->model->returnDirection($direccion);
            $this->view->renderResults($peliculas);
        }
    }

    function searchByCalification(){
        $calif = $_POST['calificacion'];

        if(isset($calif)){
            $peliculas=$this->model->returnCalif($calif);
            $this->view->renderResults($peliculas);
        }
    }

    function addGenre(){
        $this->checkLogin();

        $genre= $_POST['generoCrear'];
        if(isset($genre)){
            $this->modelGeneros->insertGenre($genre);
            $this->view->homeLocation();
        }
    }

    function deleteMovie($params=null){
        $this->checkLogin();

        $id= $params [':ID'];
        $this->model->delete($id);
        $this->view->moviesLocation();
    }

    function showForm($params=null){
        $id= $params [':ID'];
        $generos=$this->modelGeneros->selectAllGenres();
        $peliculas=$this->model->returnMovieByID($id);
        $this->view->showForm($id, $generos, $peliculas);
        
    }

    function editMovie($params=null){
        $this->checkLogin();

        $id= $params [':ID'];

        if(isset($_POST['title']) && ($_POST['title'] !=null) && ($_POST['anio']) && ($_POST['pais']) && 
            ($_POST['director_a']) && ($_POST['calif']) && ($_POST['genero'])){
                $this->model->edit($_POST['title'],$_POST['anio'],$_POST['pais'],$_POST['director_a'],$_POST['calif'],$_POST['genero'],$id);
                $this->view->moviesLocation();

        }else $this->view->showError("Complete los campos para continuar");
    }

    function deleteGenre($params=null){
        $this->checkLogin();

        $id= $params [':ID'];
        $this->modelGeneros->deleteGenre($id);
        $this->view->genresLocation();
    }

    function showFormGenres($params=null){
        $this->checkLogin();
        $id_genero= $params [':ID'];

        $genero=$this->modelGeneros->returnGenreByID($id_genero);
        $this->view->showFormGenre($id_genero, $genero);
    }

    function editGenre($params=null){
        $this->checkLogin();
        
        $id_genero= $params [':ID'];
        $nombre=$_POST['genreName'];
        if(isset($nombre)){
            $this->modelGeneros->editGenre($nombre, $id_genero);
            $this->view->genresLocation();
        }
       
    }

    function showDetail($params=null){
        $id= $params [':ID'];
        $pelicula=$this->model->returnMovieByID($id);
        
        $user=$this->helper->returnUser();
        $this->view->viewAllMovies($pelicula, $user);
    }

    function advancedSearch(){
        $title = $_POST['nombrePelicula2'];
        $anio=$_POST['anio2'];
        $peliculas=$this->model->advancedSearch($title, $anio);

        $this->view->renderResults($peliculas);
    }

}




