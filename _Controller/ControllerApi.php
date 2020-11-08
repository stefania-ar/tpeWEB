<?php

require_once '_Model/ModelComentarios.php';
require_once '_View/ApiView.php';

class ControllerApi{

    private $modelComentarios;
    private $view;

    function __construct(){
        #$this->modelPeliculas= new ModelPeliculas();
        $this->modelComentarios= new ModelComentarios();
        $this->view= new ApiView();
    }

    function getComments($params=null){
        $comments=$this->modelComentarios->getComments();
        $this->view->response($comments, 200);
    }

    function getComment($params=null){
        $id= $params [':ID'];
        $comen=$this->modelComentarios->getComment($id);

        if(!empty($comen)){
           $this->view->response($comen, 200); 
        }
        else{
            $this->view->response("El comentario no existe", 404); 
        }
        
    }




}



