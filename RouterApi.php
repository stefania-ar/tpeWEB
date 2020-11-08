<?php
require_once 'RouterClass.php';
require_once '_Controller/ControllerApi.php';

$r= new Router();

$r->addRoute("comentarios", "GET", "ControllerApi", "getComments");
$r->addRoute("comentarios/:ID", "GET", "ControllerApi", "getComment");

//run
$r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);