<?php
namespace Libs;
require_once 'models/pokemon.php';

class View{
    public $message;

    function __construct(){
    }

    function render($name){
        require "views/$name.php";
    }

    function generateCard($pokemonsCollection){
        foreach($pokemonsCollection as $pokemon){
            $types = '';
            foreach($pokemon->getTypes() as $type){
                $types.= '<p class="card-text me-2"><small class="badge text-bg-warning">'.$type->type->name.'</small></p>';
            }

            echo '
            <div class="card mb-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="'.$pokemon->getImage().'" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">'.$pokemon->getName().'</h5>
                                <div class="d-flex">'.$types.'</div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    }
}