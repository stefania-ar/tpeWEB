<?php
require_once '_View/ApiView.php';


abstract class ApiController {
    protected $model; // lo instancia el hijo
    protected $view;
    private $data; 

    public function __construct() {
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input"); 
    }

    function getData(){ 
        return json_decode($this->data); 
    }  
}
