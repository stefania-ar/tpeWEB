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

     function registerUser($user, $hash){
         $sentencia=$this->db->prepare("INSERT INTO users (username, password, tipo_usuario) VALUES (?,?,0)");
         $sentencia->execute(array($user, $hash));
     }

     function getUsers(){
         $sentencia=$this->db->prepare("SELECT * FROM users");
         $sentencia->execute();
         return $sentencia-> fetchAll(PDO::FETCH_OBJ);
     }

    
}

