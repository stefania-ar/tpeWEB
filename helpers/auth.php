<?php

require_once './_Model/ModelPeliculas.php';
require_once './_Model/ModelUser.php';

class helper{

    private $modelUser;

    function __construct(){
        $this->modelUser= new modelUser();
    }

    function start_session(){

        if(session_status()== PHP_SESSION_NONE){
            session_start();
        }
    }

    function returnUser(){
        $this->start_session();

        if(isset($_SESSION['USER'])){
            $user=$_SESSION['USER'];
            $userDB=$this->modelUser->getUser($user);
            return $userDB;
        }else{
             $user=null;
             return $user;
        }
    }

    function auth($params=null){
        $this->start_session();
        if(isset($_SESSION['USER'])){
            return true;
        }
        return false;
    }

    function checkType(){
        $this->start_session();
        if(isset($_SESSION['TYPE']) && ($_SESSION['TYPE'] == 1)){
            return true;
        }else return false;
    }

    function checkUser(){
        $this->start_session();
        if(isset($_SESSION['USER'])){
            return true;
        }else return false;
    }

    function checkLogin(){
        session_start();

        if(!isset($_SESSION['TYPE'])){
            $this->viewUser->render_login();
                die();
        }else if ( (isset($_SESSION['TYPE'])) && ($_SESSION['TYPE']!=1) ) {#es distinto de 1 porque si lo pongo igual no sé a donde llevarlo
                $this->viewUser->render_login();                            #porque viene de muchos lugares
                die();
            
        }
        
    }
}
