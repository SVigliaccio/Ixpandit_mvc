<?php
namespace Libs;
require_once "services/pokeapiservice.php";
use Services\PokeApiService;

class Model{
    protected $pokeapi;
    function __construct(){
        $this->pokeapi = new PokeApiService();
    }

}