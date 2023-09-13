<?php
namespace Libs;

class Controller{
    protected $view;
    protected $model;

    function __construct(){
        $this->view = new View();
    }

    function loadModel($model){
        $url = "models/$model"."model.php";
        
        if(file_exists($url)){
            require $url;
            $model_name = ucfirst($model).'Model';
            
            $this->model = new $model_name();
        }
    }
    
}