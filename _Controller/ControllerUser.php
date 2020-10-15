<?php

require_once './_Model/ModelUser.php';
require_once './_View/ViewUser.php';
require_once './_View/ViewPeliculas.php';

Class ControllerUser{

    private $model;
    private $view;

    function __construct(){
        $this->model= new ModelUser();
        $this->view= new ViewUser();
    }

    function login (){
        session_start();

        if(!isset($_SESSION['USER'])){
            $this->view->render_login();
            die();
        }else {
            $this->view->homeLocation();
        }
    }

    function logout(){
        session_start();
        session_destroy();
        $this->view->loginLocation();
    }

    function verifyUser(){
        $user= $_POST['user'];
        $pass= $_POST['password'];

        
        if(isset($user)){
            $userDB=$this->model->getUser($user);

            if(isset($userDB) && $userDB){

                if(password_verify($pass, $userDB->password)) {
                    session_start();
                    $_SESSION['USER']=  $userDB->username;
                    $_SESSION['TYPE']=  $userDB->tipo_usuario;

                    $this->view->homeLocation();
                }else $this->view->render_login("Contraseña incorrecta");

            }else $this->view->render_login("Usuario incorrecto");
            
        }
    }
    
}




