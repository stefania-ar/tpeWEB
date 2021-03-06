<?php

class ModelPeliculas{

    private $db;

    function __construct(){
        $this->db= new PDO('mysql:host=localhost;' .'dbname=basepeliculas;charset=utf8' , 'root', '');
    }

    function insert($title, $anio, $pais, $director_a, $calif, $genre, $fileTemp=null, $fileName=null){
        if(isset($fileTemp)){
            $filepath= "./imagenes/".uniqid("", true) . "." . strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
            move_uploaded_file($fileTemp, $filepath);
            
        }else {
            $filepath="";
        }
        $sentencia=$this->db->prepare(" INSERT INTO peliculas(titulo, anio, pais, director_a, calificacion, id_genero, imagen) 
                VALUES (?,?,?,?,?,?,?)");
        $sentencia-> execute(array($title, $anio, $pais, $director_a, $calif, $genre, $filepath));
    }
    
    function selectAllTable(){    //LIMIT 3 te devuelve solo las primeras 3
        $sentencia=$this->db->prepare(" SELECT * FROM peliculas p INNER JOIN generos g ON p.id_genero= g.id_genero ORDER BY titulo ASC");
        $sentencia-> execute();
        $peliculas=$sentencia-> fetchAll(PDO::FETCH_OBJ);
        return $peliculas;
     }
     
    function selectByGenre($genre){
        $sentencia=$this->db->prepare(" SELECT * FROM peliculas p INNER JOIN generos g ON p.id_genero= g.id_genero WHERE `nombre`=?");
        $sentencia-> execute(array($genre));
        $peliculas=$sentencia-> fetchAll(PDO::FETCH_OBJ);
        return $peliculas;
    }

    function search($parametro, $valor) {

        $sentencia=$this->db->prepare(" SELECT * FROM peliculas p INNER JOIN generos g ON p.id_genero= g.id_genero WHERE `$parametro`=?");
        $sentencia-> execute(array($valor));
        return $peliculas=$sentencia-> fetchAll(PDO::FETCH_OBJ);
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
    
    function edit($title, $anio, $pais, $director_a, $calif, $genre, $id, $fileTemp=null,$fileName=null){
        if(isset($fileTemp) && $fileTemp != null){
            $filepath= "./imagenes/".uniqid("", true) . "." . strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
            move_uploaded_file($fileTemp, $filepath);
            
        }else {
            //unlink($filepath);
            $filepath="";
        }
        $sentencia=$this->db->prepare("UPDATE peliculas SET titulo=?, anio=?, pais=?, director_a=?, calificacion=?, id_genero=?, imagen=?
                         WHERE id=?");
        $sentencia-> execute(array($title, $anio, $pais, $director_a, $calif, $genre,$filepath, $id));
    }

    function editNoImage($title, $anio, $pais, $director_a, $calif, $genre, $id){
        $sentencia=$this->db->prepare("UPDATE peliculas SET titulo=?, anio=?, pais=?, director_a=?, calificacion=?, id_genero=?
                         WHERE id=?");
        $sentencia-> execute(array($title, $anio, $pais, $director_a, $calif, $genre, $id));
    }
    

    function advancedSearch($titulo, $anio, $pais, $direccion, $calif, $genero){
        $UserSearch = "SELECT * FROM peliculas p INNER JOIN generos g ON p.id_genero= g.id_genero ";
        $array = array();

        if (!empty($titulo))  {
            $array['titulo']= $titulo;
        }
        if (!empty($anio)){
            $array['anio']=$anio;
        }
        if($pais != "Select"){
            $array['pais']= $pais;
        }
        if (!empty($direccion)){
            $array['director_a']=$direccion;
        }
        if(!empty($calif)){
            $array['calificacion']=$calif;
        }
        if($genero != "Select"){
            $array['nombre']= $genero;
        }

        $ref=array_keys($array); //Devuelve todas las claves de un array o un subconjunto de claves de un array
        $last_key = end($ref);

        $UserSearch = "SELECT * FROM peliculas p INNER JOIN generos g ON p.id_genero= g.id_genero WHERE ";
        

        foreach ($array as $key => $value)
        {
            $UserSearch .=  $key . " LIKE '%" . $value . "%'";
            if ($last_key != $key) $UserSearch .= ' AND ';
            
        }
        
        $stmt=$this->db->prepare($UserSearch);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}


