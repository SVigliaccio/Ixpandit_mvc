<?php
namespace Pokemon;
require_once 'controllers/error.php';
use Controllers\{Error, Main};

class App{
    function __construct(){
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
       
        if(!isset($url[0]) || empty($url[0]) ){
            require_once "controllers/main.php";
            $controller = new Main(); //default main page.
            $controller->loadModel('main');
        }else{
            $file_controller = "controllers/$url[0].php"; //$url -> index 0, file
            
            if(file_exists($file_controller)){
                require_once $file_controller;
                $class_name = "Controllers\\".ucfirst($url[0]);
                $controller = new $class_name();
                $controller->loadModel($url[0]);
               
                if(isset($url[1]) && method_exists($controller, $url[1])){//$url -> index 1, method
                    $controller->{$url[1]}();
                }else{
                    $controller = (new Main())->render() ;
                }
            }else{
                $controller = new Error();
            }
        } 
    }
}
