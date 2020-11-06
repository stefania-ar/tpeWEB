<?php

require_once './_Model/ModelPeliculas.php';
require_once './_View/ViewPeliculas.php';
require_once './_View/ViewUser.php';
require_once './_Model/ModelUser.php';
require_once './_Model/ModelGeneros.php';

class ControllerPeliculas{

    private $model;
    private $view;
    private $viewUser;
    private $modelUser;
    private $modelGeneros;

    function __construct(){
        $this->model= new ModelPeliculas();
        $this->view= new ViewPeliculas();
        $this->viewUser= new ViewUser();
        $this->modelUser= new ModelUser();
        $this->modelGeneros= new ModelGeneros();
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
        }else if ( (isset($_SESSION['TYPE'])) && ($_SESSION['TYPE']!=1) ) {
                $this->viewUser->render_login();
                die();
            
        }
        
    }

    function insert(){
        $this->checkLogin();

        $genre=$_POST['genero'];
        $this->model->insert($_POST['title'],$_POST['anio'],$_POST['pais'],$_POST['director_a'],$_POST['calif'],$genre);
        $this->view->homeLocation();
    }

    function viewAllMovies(){
        $peliculas=$this->model->selectAllTable();
        $this->view->onlyMovies($peliculas);
    }
    
    function viewAllGenres(){
        $generos=$this->modelGeneros->selectAllGenres();
        $this->view->viewAllGenres($generos);
    }

    function viewByGenre(){
        $genre= $_POST['genero2'];
        $peliculas=$this->model->selectByGenre($genre);
        $this->view->viewAllMovies($peliculas);
    }

    function searchByName(){
        $nombre= $_POST['nombrePelicula'];
        $peliculas=$this->model->returnName($nombre);
        $this->view->viewAllMovies($peliculas);
    }

    function searchByYear(){
        $anio= $_POST['anio'];
        $peliculas=$this->model->returnYear($anio);
        $this->view->viewAllMovies($peliculas);
    }

    function searchByCountry(){
        $pais= $_POST['pais2'];
        $peliculas=$this->model->returnCountry($pais);
        $this->view->viewAllMovies($peliculas);
    }

    function searchByDirection(){
        $direccion = $_POST['direccion'];
        $peliculas=$this->model->returnDirection($direccion);
        $this->view->viewAllMovies($peliculas);
    }

    function searchByCalification(){
        $calif = $_POST['calificacion'];
        $peliculas=$this->model->returnCalif($calif);
        $this->view->viewAllMovies($peliculas);
    }

    function addGenre(){
        $this->checkLogin();

        $genre= $_POST['generoCrear'];
        $this->modelGeneros->insertGenre($genre);
        $this->view->homeLocation();
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
        $this->model->edit($_POST['title'],$_POST['anio'],$_POST['pais'],$_POST['director_a'],$_POST['calif'],$_POST['genero'],$id);
        $this->view->moviesLocation();
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
        $this->modelGeneros->editGenre($nombre, $id_genero);
        $this->view->genresLocation();
    }

    function showDetail($params=null){
        $id= $params [':ID'];
        $peliculas=$this->model->returnMovieByID($id);
        $this->view->viewAllMovies($peliculas);
    }

    function shownum(){
        $c=$this->model->getCapacidad();
        $this->view->showcap($c);
    }
}




