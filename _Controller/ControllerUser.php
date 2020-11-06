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

    function registerUser(){
        $this->view->showFormRegister("");
    }

    function registerNewUser(){
        $user= $_POST['userR'];
        $password=$_POST['passwordR'];

        if(isset($user) && ($password)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $this->model->registerUser($user, $hash);

            session_start();

                $userDB=$this->model->getUser($user);
                $_SESSION['USER']=  $userDB->username;
                $_SESSION['TYPE']=  $userDB->tipo_usuario;

                $this->view->homeLocation();
        }else $this->view->showFormRegister("Ingrese usuario y/o contraseña");
    }

    private function checkType(){
        if(session_status()== PHP_SESSION_NONE){
            session_start();
        }
        if(isset($_SESSION['TYPE']) && ($_SESSION['TYPE'] == 1)){
            return true;
        }else return false;
    }
    
    function getAllUsers(){
        $type=$this->checkType();

        if($type ==true){
            $users=$this->model->getUsers();
            $this->view->showUsers($users, $type);
        }else $this->view->homeLocation();
        
    }

    function cambiarPermisos($params=null){
        $permiso=$this->checkType();

        if ($permiso== true){
            $id= $params [':ID'];
            $userDB=$this->model->getUserByID($id);

            $type=$userDB->tipo_usuario;

            if ($type == 1) {
                $type=0;
            }else {
                $type=1;
            }
            
            $this->model->cambiarPermisos($type, $id);
            $this->view->usersLocation();
        }else $this->view->homeLocation();
        
    }

    function deleteUser($params=null){
        $permiso=$this->checkType();
        
        if ($permiso== true){
        $id= $params [':ID'];
        $this->model->deleteUser($id);
        $this->view->usersLocation();
        
        }
    }
}




