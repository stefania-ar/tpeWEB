<?php
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
define('LOGIN', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/login');
define('LOGOUT', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/logout');
define('USERS', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/showAllUsers');
define('MOVIES', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/showAll');


require_once '_Controller/ControllerPeliculas.php';
require_once '_Controller/ControllerUser.php';
require_once 'RouterClass.php';

$r= new Router();

$r->addRoute("home", "GET", "ControllerPeliculas", "home");
$r->addRoute("insert", "POST", "ControllerPeliculas", "insert");
$r->addRoute("showAll", "GET", "ControllerPeliculas", "viewAllMovies");
$r->addRoute("buscarPorNombre", "POST", "ControllerPeliculas", "searchByName");
$r->addRoute("buscarPorAnio", "POST", "ControllerPeliculas", "searchByYear");
$r->addRoute("buscarPorPais", "POST", "ControllerPeliculas", "searchByCountry");
$r->addRoute("buscarPorDireccion", "POST", "ControllerPeliculas", "searchByDirection");
$r->addRoute("buscarPorCalificacion", "POST", "ControllerPeliculas", "searchByCalification");
$r->addRoute("borrar/:ID", "GET", "ControllerPeliculas", "deleteMovie");
$r->addRoute("editar/:ID", "GET", "ControllerPeliculas", "showForm");
$r->addRoute("editarDesdeForm/:ID", "POST", "ControllerPeliculas", "editMovie");
$r->addRoute("detalle/:ID", "GET", "ControllerPeliculas", "showDetail");
$r->addRoute("numero", "GET", "ControllerPeliculas", "shownum");
$r->addRoute("elegirCalif/:ID", "POST", "ControllerPeliculas", "NewScore");
$r->addRoute("buscarAvanzado", "POST", "ControllerPeliculas", "advancedSearch");
$r->addRoute("deleteImage/:ID", "GET", "ControllerPeliculas", "showForm");


//GENERO
$r->addRoute("borrar_genero/:ID", "GET", "ControllerPeliculas", "deleteGenre");
$r->addRoute("editar_genero/:ID", "GET", "ControllerPeliculas", "showFormGenres");
$r->addRoute("editarGeneroDesdeForm/:ID", "POST", "ControllerPeliculas", "editGenre");
$r->addRoute("crearGenero", "POST", "ControllerPeliculas", "addGenre");
$r->addRoute("selectByGenre", "POST", "ControllerPeliculas", "viewByGenre");
$r->addRoute("showAllGenres", "GET", "ControllerPeliculas", "viewAllGenres");

//USUARIOS
$r->addRoute("login", "GET", "ControllerUser", "login");
$r->addRoute("logout", "GET", "ControllerUser", "logout");
$r->addRoute("verify", "POST", "ControllerUser", "verifyUser"); 
$r->addRoute("register", "GET", "ControllerUser", "registerUser");
$r->addRoute("registerForm", "POST", "ControllerUser", "registerNewUser"); 
$r->addRoute("showAllUsers", "GET", "ControllerUser", "getAllUsers");
$r->addRoute("cambiarPermisos/:ID", "GET", "ControllerUser", "cambiarPermisos");
$r->addRoute("delete/:ID", "GET", "ControllerUser", "deleteUser");

$r->setDefaultRoute("ControllerPeliculas", "home");

//run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
