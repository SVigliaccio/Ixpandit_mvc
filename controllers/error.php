<?php
namespace Controllers;
use Libs\Controller;

class Error extends Controller{

    function __construct($message = "Error al cargar recurso"){
        parent::__construct();
        $this->view->message = $message;
        $this->view->render('error/index');
    }
}