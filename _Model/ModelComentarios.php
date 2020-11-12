<?php

class ModelComentarios{

    private $db;

    function __construct(){
        $this->db= new PDO('mysql:host=localhost;' .'dbname=basepeliculas;charset=utf8' , 'root', '');
    }

    function getComments(){
        $sentencia= $this->db->prepare("SELECT * FROM comentarios WHERE id_pelicula=24");
        $sentencia->execute();
        return $comen=$sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getComment($id){
        $sentencia=$this->db->prepare("SELECT * FROM comentarios WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function eliminarComent($id){
        $sentencia=$this->db->prepare("DELETE FROM comentarios WHERE id=?");
        $sentencia->execute(array($id));
    }

    function insertComment($comentario, $id_usuario, $id_pelicula){
        $sentencia=$this->db->prepare("INSERT INTO comentarios(comentario, id_usuario, id_pelicula) VALUES(?,?,?)");
        $sentencia->execute(array($comentario, $id_usuario, $id_pelicula));
        return $this->db->lastInsertId();
    }
}