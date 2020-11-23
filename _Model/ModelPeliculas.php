<?php

class ModelPeliculas{

    private $db;

    function __construct(){
        $this->db= new PDO('mysql:host=localhost;' .'dbname=basepeliculas;charset=utf8' , 'root', '');
    }

    function insert($title, $anio, $pais, $director_a, $calif, $genre, $fileTemp=null){
        if(isset($fileTemp)){
            $fileName=basename($_FILES["input_img"]["name"]);
            $filepath= "./imagenes/".uniqid("", true) . "." . strtolower(pathinfo($_FILES['input_img']['name'], PATHINFO_EXTENSION));
        
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
    
    function edit($title, $anio, $pais, $director_a, $calif, $genre, $id, $fileTemp=null){
        if(isset($fileTemp) && $fileTemp != null){
            $fileName=basename($_FILES["input_img"]["name"]);
            $filepath= "./imagenes/".uniqid("", true) . "." . strtolower(pathinfo($_FILES['input_img']['name'], PATHINFO_EXTENSION));
        
            move_uploaded_file($fileTemp, $filepath);
            
        }else {
            //unlink($filepath);
            $filepath="";
        }
        $sentencia=$this->db->prepare("UPDATE peliculas SET titulo=?, anio=?, pais=?, director_a=?, calificacion=?, id_genero=?, imagen=?
                         WHERE id=?");
        $sentencia-> execute(array($title, $anio, $pais, $director_a, $calif, $genre,$filepath, $id));
    }
    

    function advancedSearch($title, $anio){
        $UserSearch = "SELECT * FROM peliculas p INNER JOIN generos g ON p.id_genero= g.id_genero ";
        $array = array();

        if (!empty($title))  {
            $array['title']= $title;
        }
        if (!empty($anio)){
            $array['anio']=$anio;
        }

        $longitud= count($array);
        $ref=array_keys($array);
        $last_key = end($ref);

        $UserSearch = "SELECT * peliculas p INNER JOIN generos g ON p.id_genero= g.id_genero WHERE ";
        

                foreach ($array as $key => $value)
                {
                    $UserSearch .= $key . ' LIKE %"' . $value . '"%';
                    if ($last_key != $key) $UserSearch .= ' AND ';
                    
                }
        $stmt=$this->db->prepare($UserSearch);

        foreach ($array as $key => $value)
        {
           $stmt->bindValue($key, $value);
            
        }
        var_dump($UserSearch);
        $stmt->execute();
        var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
        die();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}


