<?php
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
define('LOGIN', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/login');
define('LOGOUT', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/logout');


require_once '_Controller/ControllerPeliculas.php';
require_once '_Controller/ControllerUser.php';
require_once 'RouterClass.php';

$r= new Router();

$r->addRoute("home", "GET", "ControllerPeliculas", "home");
$r->addRoute("insert", "POST", "ControllerPeliculas", "insert");
$r->addRoute("showAll", "GET", "ControllerPeliculas", "viewAllMovies");
$r->addRoute("showAllGenres", "GET", "ControllerPeliculas", "viewAllGenres");
$r->addRoute("selectByGenre", "POST", "ControllerPeliculas", "viewByGenre");
$r->addRoute("buscarPorNombre", "POST", "ControllerPeliculas", "searchByName");
$r->addRoute("buscarPorAnio", "POST", "ControllerPeliculas", "searchByYear");
$r->addRoute("buscarPorPais", "POST", "ControllerPeliculas", "searchByCountry");
$r->addRoute("buscarPorDireccion", "POST", "ControllerPeliculas", "searchByDirection");
$r->addRoute("buscarPorCalificacion", "POST", "ControllerPeliculas", "searchByCalification");
$r->addRoute("crearGenero", "POST", "ControllerPeliculas", "addGenre");
$r->addRoute("borrar/:ID", "GET", "ControllerPeliculas", "deleteMovie");
$r->addRoute("editar/:ID", "GET", "ControllerPeliculas", "showForm");
$r->addRoute("editarDesdeForm/:ID", "POST", "ControllerPeliculas", "editMovie");
$r->addRoute("detalle/:ID", "GET", "ControllerPeliculas", "showDetail");

//GENERO
$r->addRoute("borrar_genero/:ID", "GET", "ControllerPeliculas", "deleteGenre");
$r->addRoute("editar_genero/:ID", "GET", "ControllerPeliculas", "showFormGenres");
$r->addRoute("editarGeneroDesdeForm/:ID", "POST", "ControllerPeliculas", "editGenre");

$r->addRoute("login", "GET", "ControllerUser", "login");
$r->addRoute("logout", "GET", "ControllerUser", "logout");
$r->addRoute("verify", "POST", "ControllerUser", "verifyUser");

$r->setDefaultRoute("ControllerPeliculas", "home");

//run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
