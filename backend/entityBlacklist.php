<?php
require_once "../dbClass.php";

class EntityBlacklist extends DBClass{
    public $id;
    public $cpf;
    public $name;

    public function __construct() {
    }

    // public function __construct($id, $cpf, $name) {
    //    $this->id = $id;
    //    $this->cpf = $cpf;
    //    $this->name = $name;
    // }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getCpf(){
        return $this->cpf;
    }
    
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getName(){
        return $this->name;
    }
    
    public function setName($name){
        $this->name = $name;
    }
}
