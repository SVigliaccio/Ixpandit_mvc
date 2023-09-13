<?php
require_once 'libs/model.php';
require_once 'services/curl.php';
require_once 'models/pokemon.php';
use Libs\Model;
// use Services\Curl;

class MainModel extends Model{
    /**
     * @var Pokemon[] $pokemonsCollection
     */
    public $pokemonsCollection;

    function __construct(){
        parent::__construct();
        $this->pokemonsCollection = [];
    }

    function searchPokemon($namePokemon){
        $pokemons = $this->validatePartialName($namePokemon);
        if($pokemons !== null){
            foreach($pokemons as $pokemon){
                $pokemonComplete = $this->pokeapi->getPokemon($pokemon->name);
                self::setPokemonCollection($pokemonComplete);
            }
        }else{
            new Error("No se encontraron coincidencias de su busqueda.");
        }
    }

    private function validatePartialName($pokemon_name){
        $matchingPokemon = array_filter( (array)$_SESSION['poke_name_list'], function($pokemon) use ($pokemon_name) {
            return stripos($pokemon->name, $pokemon_name) !== false;
        });
    
        // Devuelve las primeras 3 coincidencias o todas si hay menos de 3
        if(count($matchingPokemon) > 0){
            return array_slice($matchingPokemon, 0, 3);
        }else{
            return null;
        }
    }

    private function setPokemonCollection($pokemonComplete){
        $types = [];
        foreach($pokemonComplete->types as $type){
            $types[] = $type;
        }

        $this->pokemonsCollection[] = new Pokemon($pokemonComplete->id, $pokemonComplete->name, $types, $pokemonComplete->sprites->front_default);
    }

}