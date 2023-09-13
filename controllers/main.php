<?php
namespace Controllers;

use Libs\Controller;

class Main extends Controller{

    function __construct(){
        parent::__construct();
        $_SESSION['pokemonsCollection'] = null;
    }

    function searchPokemon(){
        $pokemon_name = $_POST['pokemon_name'] ?? null;

        if(isset($pokemon_name)){
            $this->model->searchPokemon($pokemon_name);
            $_SESSION['pokemonsCollection'] = $this->model->pokemonsCollection;
            self::render();
        }else{
            (new Main())->render();
        }
    }

    function render(){
        $this->view->render('main/index');
    }
    
}
