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
        
        $user=$this->helper->checkUser();
        $type=$this->helper->checkType();
        
        $this->view->showHome($generos, $user, $type);
    }
    private function checkLogin(){
        session_start();

        if(!isset($_SESSION['TYPE'])){
            $this->viewUser->render_login();
                die();
        }else if ( (isset($_SESSION['TYPE'])) && ($_SESSION['TYPE']!=1) ) {#es distinto de 1 porque si lo pongo igual no sé a donde llevarlo
                $this->viewUser->render_login();                            #porque viene de muchos lugares
                die();                                                      #el render login porque si esta seteado te deja pasar directamente
            
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

                }else{
                    $this->model->insert($_POST['title'],$_POST['anio'],$_POST['pais'],
                        $_POST['director_a'],$_POST['calif'],$genre);
                }
                $this->view->homeLocation();
             
               
        } else $this->view->showError("Complete los campos para continuar");
        
    }
     
    function viewAllMovies(){
        $peliculas=$this->model->selectAllTable();
        $type=$this->helper->checkType();

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
        $type=$this->helper->checkType();
        $generos=$this->modelGeneros->selectAllGenres();
        $this->view->viewAllGenres($generos, $type);
    }

    function searchBy(){  
        $search= $_POST['valor'];
        $parametro= $_POST['parametro'];
        
        if(isset($search) && isset($parametro) && $search != "" && $parametro != ""){
            $peliculas=$this->model->search($parametro, $search);
            $this->view->renderResults($peliculas);
        }else $this->view->showError("Complete los campos para continuar");
        
        
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
        $this->checkLogin();
        $id= $params [':ID'];
        $generos=$this->modelGeneros->selectAllGenres();
        $peliculas=$this->model->returnMovieByID($id);
        $this->view->showForm($id, $generos, $peliculas);
        
    }

    function editMovie($params=null){
        $this->checkLogin();
        $id= $params [':ID'];
        $imagen= $_POST['imagen'];

        if(isset($_POST['title']) && ($_POST['title'] !=null) && ($_POST['anio']) && ($_POST['pais']) && 
            ($_POST['director_a']) && ($_POST['calif']) && ($_POST['genero'])){

                if($_FILES['input_img']['type'] == "image/jpg" || $_FILES['input_img']['type'] == "image/jpeg" || 
                $_FILES['input_img']['type'] == "image/png" || isset($imagen) ) {
                    $this->model->edit($_POST['title'],$_POST['anio'],$_POST['pais'],$_POST['director_a'],$_POST['calif'],
                    $_POST['genero'],$id,$_FILES['input_img']['tmp_name']);
                }else {
                    $this->model->editNoImage($_POST['title'],$_POST['anio'],$_POST['pais'],$_POST['director_a'],$_POST['calif'],$_POST['genero'],
                    $id);
                }
                
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
        $pais= $_POST['pais2'];
        $direccion=$_POST['direccion2'];
        $calif=$_POST['calificacion2'];
        $genero=$_POST['genero2'];

        $peliculas=$this->model->advancedSearch($title, $anio, $pais, $direccion, $calif, $genero);
        $this->view->renderResults($peliculas);
    }

    function getPromedioPuntuacion($params=null){
        //$id= $params['ID'];
        $id=24; 
        $idPeli=$this->model->returnMovieByID($id);
        //$idPeli->id;
        $prom=$this->model->getPromedio(24);
        var_dump($prom);
    }
}




