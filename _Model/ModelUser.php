<?php
Class ModelUser{

    private $db;

    function __construct(){
        $this->db= new PDO('mysql:host=localhost;' .'dbname=basepeliculas;charset=utf8' , 'root', '');
    }

    function getUser($user){
        $sentencia=$this->db->prepare(" SELECT * FROM users WHERE username=?");
        $sentencia-> execute(array($user));
        return $sentencia-> fetch(PDO::FETCH_OBJ);
     }

    
}

