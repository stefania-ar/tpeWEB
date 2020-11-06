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

     function cambiarPermisos($type, $id){
         $sentencia=$this->db->prepare("UPDATE users SET tipo_usuario=? WHERE id=?");
         $sentencia->execute(array($type, $id));

     }

     function getUserByID($id){
        $sentencia=$this->db->prepare(" SELECT * FROM users WHERE id=?");
        $sentencia-> execute(array($id));
        return $sentencia-> fetch(PDO::FETCH_OBJ);
     }

     function deleteUser($id){
         $sentencia=$this->db->prepare("DELETE FROM users WHERE id=?");
         $sentencia->execute(array($id));
     }
    
}

