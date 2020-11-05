<?php

class ModelGeneros{

    private $db;

    function __construct(){
        $this->db= new PDO('mysql:host=localhost;' .'dbname=basepeliculas;charset=utf8' , 'root', '');
    }

    function selectAllGenres(){
        $sentencia=$this->db->prepare(" SELECT * FROM generos");
        $sentencia-> execute();
        return $generos=$sentencia-> fetchAll(PDO::FETCH_OBJ);
     }

     function insertGenre($genre){
        $sentencia=$this->db->prepare("INSERT INTO generos (nombre) VALUES (?)");
        $sentencia-> execute(array($genre));
    }

    function deleteGenre($id){
        $sentencia=$this->db->prepare("DELETE FROM generos WHERE id_genero=?");
        $sentencia-> execute(array($id));
    }

    function returnGenreByID($id_genero){
        $sentencia=$this->db->prepare(" SELECT * FROM generos WHERE id_genero=?");
        $sentencia-> execute(array($id_genero));
        return $peliculas=$sentencia-> fetch(PDO::FETCH_OBJ);
    }

    function editGenre($nombre, $id_genero){
        $sentencia=$this->db->prepare("UPDATE generos SET nombre=? WHERE id_genero=?");
        $sentencia-> execute(array($nombre, $id_genero));
    }

}