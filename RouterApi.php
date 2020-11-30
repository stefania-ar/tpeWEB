<?php
require_once 'RouterClass.php';
require_once '_Controller/CommentsControllerApi.php';
require_once '_Controller/APIController.php';

$r= new Router();

$r->addRoute("peliculas/:ID/comentarios", "GET", "CommentsControllerApi", "getComments");
$r->addRoute("comentario/:ID", "GET", "CommentsControllerApi", "getComment");
$r->addRoute("comentarios/:ID", "DELETE", "CommentsControllerApi", "deleteComment");
$r->addRoute("comentarios", "POST", "CommentsControllerApi", "insertComment");


//run
$r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);