<?php

require_once '_Model/ModelComentarios.php';
require_once 'APIController.php';


class CommentsControllerApi extends ApiController {

    function __construct(){
        #$this->modelPeliculas= new ModelPeliculas();
        parent::__construct();
        $this->modelComentarios= new ModelComentarios();
    }

    function getComments($params=null){
        
        $comments=$this->modelComentarios->getComments();
        $this->view->response($comments, 200);
        
    }

    public function getComment($params=null){
        $id= $params [':ID'];
        $comen=$this->modelComentarios->getComment($id);

        if(!empty($comen)){
           $this->view->response($comen, 200); 
        }
        else{
            $this->view->response("El comentario no existe", 404); 
        }
        
    }

    function deleteComment($params=null){
        $id= $params [':ID'];
        $this->modelComentarios->eliminarComent($id);
        $this->view->response("se borro", 200); 
         
    }

    function insertComment($params=null){
        $body=$this->getData();

        $id=$this->modelComentarios->insertComment($body->comentario, $body->id_usuario, $body->id_pelicula);

        if(!empty($id)){
            $this->view->response($this->modelComentarios->getComment($id), 200); 
         }
         else{
             $this->view->response("No se pudo insertar la tarea", 404); 
         }
    }





}



