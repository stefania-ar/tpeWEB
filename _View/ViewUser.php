<?php

require_once('./libs/smarty/Smarty.class.php');

class ViewUser{

    private $title;
    private $smarty;

    function __construct(){
        $this->title= "Ingrese para seguir navegando";
        $this->smarty= new Smarty();
    }

    function homeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function render_login($mensaje= ""){
        $this->smarty->assign('title_header', $this->title);
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('mensajeUsu', "Usuario admin: usuario");
        $this->smarty->assign('mensajeC', "Contraseña admin: 123456");
        $this->smarty->assign('m', "Tenga en cuenta que si está intentando acceder a permisos especiales sin ser administrador se le redirigirá al home automáticamente");

        $this->smarty->display('./templates/login.tpl');
    }

    function loginLocation(){
        header("Location: ".BASE_URL."login");
    }

    function showFormRegister($msj){
        $this->smarty->assign('title_header', "Regístrese");
        $this->smarty->assign('mensaje', $msj);

        $this->smarty->display('./templates/register.tpl');
    }

    function showUsers($users, $type){
        $this->smarty->assign('title_header', "usuarios");
        $this->smarty->assign('users', $users);
        $this->smarty->assign('type', $type);
        $this->smarty->assign('user', "Usuario");
        $this->smarty->assign('admin', "Administrador/a");
        $this->smarty->assign('comun', "Común");
        $this->smarty->assign('tipo', "Tipo de usuario");
        $this->smarty->assign('permiso', "Cambiar permisos");
        $this->smarty->assign('titulo', "Tabla de permisos para administradores");
        $this->smarty->assign('home', "HOME");
        $this->smarty->assign('button', "borrar");

        $this->smarty->display('./templates/viewUsers.tpl');
    }

    function usersLocation(){
        header("Location: ".BASE_URL."showAllUsers");
    }


}