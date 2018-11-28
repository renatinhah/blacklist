<?php

require_once "blacklistService.php";

// header("Content-Type:application/json");
class BlacklistController extends BlacklistService{

	public function teste(){
		$request_method = $_SERVER["REQUEST_METHOD"];
		var_dump($_SERVER['REQUEST_URI']);
	}

	
}

// $teste = new BlacklistController();
// $teste->teste();
// $teste->findById('50');
// $teste->findByName('renata');
// $teste->findAll();
