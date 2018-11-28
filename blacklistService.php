<?php
require_once "blacklistRepository.php";

class BlacklistService extends BlacklistRepository{

// Função que valida o CPF
    public function validaCPF($cpf){	// Verifiva se o número digitado contém todos os digitos
        $cpf = str_pad(ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
    	
    	// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999')
    	{
    	return false;
        } else {   // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++){
                for ($d = 0, $c = 0; $c < $t; $c++){
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d){
                    return false;
                }
            }
            return true;
        }
    }

	public function convertRecords($stmt){
		$rows = $stmt->rowCount();
		$blacklist = [];
		if($rows > 0){
		    while ($records = $stmt->fetch(PDO::FETCH_ASSOC)){
		        extract($records);
		        array_push($blacklist, $records);
		    }
		    // var_dump(json_encode($blacklist));
		}
		return $blacklist;
	}

    public function findAll(){
		$stmt = BlacklistRepository::findAll();
		$blacklistRecords = $this->convertRecords($stmt);
		// if($blacklistRecords){
		//     var_dump(json_encode($blacklistRecords));
		//     return http_response_code(200);
		// } else {
		// 	return http_response_code(200);
		// }
    }

    public function findById($id){
    	$stmt = BlacklistRepository::findById($id);
		$blacklistRecords = $this->convertRecords($stmt); 
		$blacklist = array_column($blacklistRecords, 'id');
		if(in_array($id, $blacklist)){
			var_dump('block');
		    return http_response_code(200);
		} else {
			var_dump('free');
			return http_response_code(200);
		}
    }

    public function findByCpf($cpf){
    	$stmt = BlacklistRepository::findByCpf($cpf);
		$blacklistRecords = $this->convertRecords($stmt); 
		$blacklist = array_column($blacklistRecords, 'cpf');

		if(in_array($cpf, $blacklist)){  //validar se blacklist não eh vazio se for retorna 404
			var_dump('block');
		    return http_response_code(200);
		} else {
			var_dump('free');
			return http_response_code(200);
		}

		if($naoAchou){
			return http_response_code(404);
		}
    }

    public function findByName($name){
    	$stmt = BlacklistRepository::findByName($name);
		$blacklistRecords = $this->convertRecords($stmt); 
		$blacklist = array_column($blacklistRecords, 'name');

		if(in_array($name, $blacklist)){
			var_dump('block');
		    return http_response_code(200);
		} else {
			var_dump('free');
			return http_response_code(200);
		}
    }
   
    public function insert($cpf, $name){
    	if($inseriu){
    		return http_response_code(200);
    	} else {
    		return http_response_code(503);
    	} if($dadosincorrestos){
    		return http_response_code(400);
    	}
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
// $teste = new BlacklistService();
// $teste->findByCpf('01531427154');
// $teste->findById('50');
// $teste->findByName('renata');
// $teste->findAll();
