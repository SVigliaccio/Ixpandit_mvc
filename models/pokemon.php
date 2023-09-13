<?php

class Pokemon{
    protected $id;
    protected $name;
    protected $types;
    protected $url_image;

    function __construct(int $id, string $name, array $types = [], $url_image){
        $this->id   = $id;
        $this->name = $name;
        $this->url_image = $url_image;
        foreach($types as $type){
            $this->types[] = $type;
        }
    }   

    function getName(){
        return $this->name;
    }

    function getId(){
        return $this->id;
    }

    function getTypes(){
        return $this->types;
    }

    function getImage(){
        return $this->url_image;
    }
}