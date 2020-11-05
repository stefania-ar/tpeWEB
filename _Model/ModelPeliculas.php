<?php

class ModelPeliculas{

    private $db;

    function __construct(){
        $this->db= new PDO('mysql:host=localhost;' .'dbname=basepeliculas;charset=utf8' , 'root', '');
    }

    function insert($title, $anio, $pais, $director_a, $calif, $genre){
        $sentencia=$this->db->prepare(" INSERT INTO peliculas(titulo, anio, pais, director_a, calificacion, id_genero) 
                VALUES (?,?,?,?,?,?)");
        $sentencia-> execute(array($title, $anio, $pais, $director_a, $calif, $genre));
    }
    
    function selectAllTable(){    //LIMIT 3 te devuelve solo las primeras 3
        $sentencia=$this->db->prepare(" SELECT * FROM peliculas p INNER JOIN generos g ON p.id_genero= g.id_genero ORDER BY titulo ASC");
        $sentencia-> execute();
        $peliculas=$sentencia-> fetchAll(PDO::FETCH_OBJ);
        return $peliculas;
     }

    //SACAR AL MODELO GENEROS 
    function selectAllGenres(){
        $sentencia=$this->db->prepare(" SELECT * FROM generos");
        $sentencia-> execute();
        return $generos=$sentencia-> fetchAll(PDO::FETCH_OBJ);
     }
     
    function selectByGenre($genre){
        $sentencia=$this->db->prepare(" SELECT * FROM peliculas p INNER JOIN generos g ON p.id_genero= g.id_genero WHERE `nombre`=?");
        $sentencia-> execute(array($genre));
        $peliculas=$sentencia-> fetchAll(PDO::FETCH_OBJ);
        return $peliculas;
    }

    function returnName($nombre){
        $sentencia=$this->db->prepare(" SELECT * FROM peliculas p INNER JOIN generos g ON p.id_genero= g.id_genero WHERE `titulo`=?");
        $sentencia-> execute(array($nombre));
        return $peliculas=$sentencia-> fetchAll(PDO::FETCH_OBJ);
    }

    function returnYear($anio){ //puede ser año <otro año
        $sentencia=$this->db->prepare(" SELECT * FROM peliculas p INNER JOIN generos g ON p.id_genero= g.id_genero WHERE `anio`=?");
        $sentencia-> execute(array($anio));
        return $peliculas=$sentencia-> fetchAll(PDO::FETCH_OBJ);
    }

    function returnCountry($country){
        $sentencia=$this->db->prepare(" SELECT * FROM peliculas p INNER JOIN generos g ON p.id_genero= g.id_genero WHERE `pais`=?");
        $sentencia-> execute(array($country));
        return $peliculas=$sentencia-> fetchAll(PDO::FETCH_OBJ);
    }

    function returnDirection($country){
        $sentencia=$this->db->prepare(" SELECT * FROM peliculas p INNER JOIN generos g ON p.id_genero= g.id_genero WHERE `director_a`=?");
        $sentencia-> execute(array($country));
        return $peliculas=$sentencia-> fetchAll(PDO::FETCH_OBJ);
    }

    function returnCalif($calif){
        $sentencia=$this->db->prepare(" SELECT * FROM peliculas p INNER JOIN generos g ON p.id_genero= g.id_genero WHERE `calificacion`=?");
        $sentencia-> execute(array($calif));
        return $peliculas=$sentencia-> fetchAll(PDO::FETCH_OBJ);
    }

    //SACAR DE ACA
    function insertGenre($genre){
        $sentencia=$this->db->prepare("INSERT INTO generos (nombre) VALUES (?)");
        $sentencia-> execute(array($genre));
    }

    function delete($id){
        $sentencia=$this->db->prepare("DELETE FROM peliculas WHERE id=?");
        $sentencia-> execute(array($id));
    }

    function returnMovieByID($id){
        $sentencia=$this->db->prepare(" SELECT * FROM peliculas p INNER JOIN generos g ON p.id_genero= g.id_genero WHERE `id`=?");
        $sentencia-> execute(array($id));
        return $peliculas=$sentencia-> fetchAll(PDO::FETCH_OBJ);
    }
    
    function edit($title, $anio, $pais, $director_a, $calif, $genre, $id){
        $sentencia=$this->db->prepare("UPDATE peliculas SET titulo=?, anio=?, pais=?, director_a=?, calificacion=?, id_genero=? WHERE id=?");
        $sentencia-> execute(array($title, $anio, $pais, $director_a, $calif, $genre, $id));
    }
    
    //SACAR DE ACA
    function deleteGenre($id){
        $sentencia=$this->db->prepare("DELETE FROM generos WHERE id_genero=?");
        $sentencia-> execute(array($id));
    }
    //SACAR DE ACA
    function returnGenreByID($id_genero){
        $sentencia=$this->db->prepare(" SELECT * FROM generos WHERE id_genero=?");
        $sentencia-> execute(array($id_genero));
        return $peliculas=$sentencia-> fetch(PDO::FETCH_OBJ);
    }
    //SACAR DE ACA
    function editGenre($nombre, $id_genero){
        $sentencia=$this->db->prepare("UPDATE generos SET nombre=? WHERE id_genero=?");
        $sentencia-> execute(array($nombre, $id_genero));
    }

    function getCapacidad(){
        $sentencia=$this->db->prepare("SELECT COUNT * as total FROM peliculas");
        $sentencia->execute();
        return $capaci= $sentencia-> fetchAll(PDO::FETCH_OBJ);
    }
}


