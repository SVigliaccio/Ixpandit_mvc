<?php
namespace Services;
session_start();

class PokeApiService{
    private const PATH = "https://pokeapi.co/api/v2/";
    
    function __construct(){
        if(!isset($_SESSION['poke_name_list'])){
            $_SESSION['poke_name_list'] = self::getAllPokemons();
        }
    }

    function getPokemon($namePokemon = "Pikachu"){
        $endpoint = self::PATH."pokemon-form/$namePokemon";
        $response = Curl::callEndpointGET($endpoint);
        return $response;
    }

    function getAllPokemons(){
        $endpoint = self::PATH."pokemon?limit=1";
        $response = Curl::callEndpointGET($endpoint);

        $endpoint = self::PATH."pokemon?limit=$response->count";
        $response = Curl::callEndpointGET($endpoint);
        return $response->results;
    }
}