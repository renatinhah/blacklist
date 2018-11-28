<?php
// header("Content-Type:application/json");

require_once "blacklistService.php";

if(!empty($_GET['cpf']) && validateCPF($_GET['cpf'])) {
	$cpf = $_GET['cpf'];
	$cpf = str_replace(".", "", $cpf);
    $cpf = str_replace("-", "", $cpf);

	$service = new BlacklistService();
 	$blacklist = $service->findByCpf($cpf);
	
	if(empty($blacklist)) {
		response(200,"Free",NULL);
	} else {
		response(200,"Blocked", $cpf);
	}
} else {
	response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data){
	header("HTTP/1.1 ".$status);
	
	$response['status'] = $status;
	$response['status_message'] = $status_message;
	$response['data'] = $data;

	$json_response = json_encode($response);
	echo $json_response;
}

function validateCPF($cpf){	
    $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);
    if (strlen($cpf) != 11){
        return false;
    }
    for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--){
        $soma += $cpf{$i} * $j;
    }
    $resto = $soma % 11;
    if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto)){
        return false;
    }
    for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--){
        $soma += $cpf{$i} * $j;
    }
    $resto = $soma % 11;
    return $cpf{10} == ($resto < 2 ? 0 : 11 - $resto);
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


