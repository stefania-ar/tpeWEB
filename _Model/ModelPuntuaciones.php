<?php


class ModelPuntuaciones{

    private $db;

    function __construct(){
        $this->db= new PDO('mysql:host=localhost;' .'dbname=basepeliculas;charset=utf8' , 'root', '');
    }

    function getScoreByUser($idUSER, $id_pelicula){
        $sentencia=$this->db->prepare("SELECT * FROM puntuaciones WHERE id_usuario=? And id_pelicula=?");
        $sentencia->execute(array($idUSER, $id_pelicula));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function updateScore($score, $id){
        $sentencia=$this->db->prepare("UPDATE puntuaciones SET puntuacion=? WHERE id=?");
        $sentencia->execute(array($score, $id));
    }

    function insertScore($scorefromPost, $id_pelicula, $idUSER){
        $sentencia=$this->db->prepare("INSERT INTO puntuaciones(puntuacion, id_pelicula, id_usuario) VALUES(?,?,?) ");
        $sentencia->execute(array($scorefromPost, $id_pelicula, $idUSER));
    }

    function getScoresByUser($idUSER){
        $sentencia=$this->db->prepare("SELECT * FROM puntuaciones WHERE id_usuario=?");
        $sentencia->execute(array($idUSER));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }


}