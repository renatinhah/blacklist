<?php
require_once 'blacklistRepository.php';

class BlacklistService extends BlacklistRepository{

	public function convertData($stmt){
		$rows = $stmt->rowCount();
		if($rows > 0){
		    $blacklist = [];
		    $blacklist["records"] = [];
		    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		        extract($row);
		        $item = array("cpf" => $cpf );
		        array_push($blacklist["records"], $item);
		    }
		    var_dump(json_encode($blacklist));
		    return $blacklist;
		}
	}

    public function findAll() {
		$stmt = BlacklistRepository::findAll();
		$blacklist = $this->convertData($stmt);
		// var_dump(json_encode($blacklist));
		
		// if(){
		//     return http_response_code(200);
		// } else {
		// 	return http_response_code(200);
		// }
    }

    public function findById($id){
    	$stmt = BlacklistRepository::findById($id);
		$blacklist = $this->convertData($stmt);
		// if(){
		//     return http_response_code(200);
		// } else {
		// 	return http_response_code(200);
		// }
    }
   
}

$teste = new BlacklistService();
$teste->findById(1);
