<?php
// header("Content-Type:application/json");

require_once "blacklistService.php";

//verifica se a api está sendo testada via browser ou endpoint
if(!empty($cpf)){ 
	$_GET['cpf'] = $cpf;
}

if(!empty($_GET['cpf']) && validateCPF($_GET['cpf'])) {
	$cpf = $_GET['cpf'];
	$cpf = str_replace(".", "", $cpf);
    $cpf = str_replace("-", "", $cpf);

	$service = new BlacklistService();
 	$blacklist = $service->findByCpf($cpf);
	
	if(empty($blacklist)) {
		$response = response(200,"Free", $cpf);
	} else {
		$response = response(200,"Blocked", $cpf);
	}

} else {
	$response = response(400,"Invalid", NULL);
}

if(isset($browser)){
	$cpfStatus = $response['status_message'];
} else {
	$json_response = json_encode($response);
	echo $json_response;
}


function insert($cpf, $name){
	if(validateCPF($cpf) && !empty($name)){
		$service = new BlacklistService();
 		$blacklist = $service->insert($cpf, $name);
	} else {
		return http_response_code(400);
	}

	if(isset($blacklist)){
		return http_response_code(200);
	} else {
		return http_response_code(503);
	}
}

public function logicDelete($id){

}

public function delete($id){

}

function response($status, $status_message, $data){
	header("HTTP/1.1 ".$status);
	
	$response['status'] = $status;
	$response['status_message'] = $status_message;
	$response['data'] = $data;

	return $response;
}

function validateCPF($cpf){	
	if(empty($cpf)) {
		return false;
	}

	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	
	if (strlen($cpf) != 11) {
		return false;
	} else if ($cpf == '00000000000' || 
		$cpf == '11111111111' || 
		$cpf == '22222222222' || 
		$cpf == '33333333333' || 
		$cpf == '44444444444' || 
		$cpf == '55555555555' || 
		$cpf == '66666666666' || 
		$cpf == '77777777777' || 
		$cpf == '88888888888' || 
		$cpf == '99999999999') {
		return false;

	 } else {   
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return false;
			}
		}
		return true;
	}
}





















// header('Content-Type: application/json;charset=utf-8');
// require_once "blacklistController.php";
// var_dump('aee');
// // $requestMethod = $_SERVER["REQUEST_METHOD"];
// $requestUrl = $_SERVER['REQUEST_URI'];

// $key = array_keys($_POST);
// $values = array_values($_POST);

// $key = array_keys($_GET);
// $values = array_values($_GET);

// switch ($key[0]) {
//     case "post":
		
//         break;
//     case "get":
//     	$controller = new BlacklistController();
//         if(empty($values[0])){
// 			$controller->findAll();
// 		} else {
// 			$controller->findByCpf($values[0]);
// 		}
//         break;
//     case "put":
//         echo "i equals 2";
//         break;
//     case "delete":
//         echo "i equals 2";
//         break;
// }


