<?php
require_once "blacklistRepository.php";

class BlacklistService extends BlacklistRepository{

	public function convertRecords($stmt){
		$rows = $stmt->rowCount();
		$blacklist = [];
		if($rows > 0){
		    while ($records = $stmt->fetch(PDO::FETCH_ASSOC)){
		        extract($records);
		        array_push($blacklist, $records);
		    }
		}
		return $blacklist;
	}

    public function findAll(){
		$stmt = BlacklistRepository::findAll();
		$blacklistRecords = $this->convertRecords($stmt);
        return $blacklistRecords;
    }

    public function findById($id){
    	$stmt = BlacklistRepository::findById($id);
		$blacklistRecords = $this->convertRecords($stmt); 
		$blacklist = array_column($blacklistRecords, 'id');
		return $blacklist;
    }

    public function findByCpf($cpf){
        $stmt = BlacklistRepository::findByCpf($cpf);
        $blacklistRecords = $this->convertRecords($stmt); 
        $blacklist = array_column($blacklistRecords, 'cpf');
        return $blacklist;
    }

    public function findByName($name){
    	$stmt = BlacklistRepository::findByName($name);
		$blacklistRecords = $this->convertRecords($stmt); 
		$blacklist = array_column($blacklistRecords, 'name');
        return $blacklist;
    }
   
    public function insert($cpf, $name){
        $stmt = BlacklistRepository::insert($cpf, $name);
    	return $stmt;
    }

    public function update($cpf, $name){
    	if($modificou){
    		return http_response_code(200);
    	} else {
    		return http_response_code(503);
    	}
    }

    public function logicDelete($id){
    	if($modificou){
    		return http_response_code(200);
    	} else {
    		return http_response_code(503);
    	}
    }

    public function delete($id){
    	if($modificou){
    		return http_response_code(200);
    	} else {
    		return http_response_code(503);
    	}
    }
}
