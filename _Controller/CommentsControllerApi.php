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
        $id= $params [':ID'];
        $comments=$this->modelComentarios->getComments($id);
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
        $status=$this->auth();

        if($status== true){
            $body=$this->getData();
            
            if(!empty($body->comentario)){
                $id=$this->modelComentarios->insertComment($body->comentario, $body->puntuacion, $body->id_usuario, $body->id_pelicula);   
                if(!empty($id)){
                    $this->view->response($this->modelComentarios->getComment($id), 200); 
                }
                else{
                    $this->view->response("No se pudo insertar el comentario", 404); 
                }
            }else{
                $this->view->response("Escriba un comentario", 501);
            }

        }else {
            $this->view->response("No está loggeado, ingrese para postear un comentario", 404);
        }
        
    }

    function auth($params=null){
        if(session_status()== PHP_SESSION_NONE){
            session_start();
        }
        if(isset($_SESSION['USER'])){
            return true;
        }
        return false;
    }



}



