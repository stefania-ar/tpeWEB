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
}
