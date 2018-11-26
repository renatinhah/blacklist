<?php
require_once "entityBlacklist.php";

class BlacklistRepository extends EntityBlacklist{
    private $table_name = "blacklist";

    public function findAll() {
        $sql = "SELECT * FROM $this->table_name";
        $stm = DBClass::prepare($sql);
        $stm->execute();
        return $stm;
    }
    
    public function findById($id) {
        $sql = "SELECT * FROM $this->table_name WHERE id = :id";
        $stm = DBClass::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm;
    }

    public function findByCpf($cpf) {
        $sql = "SELECT * FROM $this->table_name WHERE cpf = :cpf";
        $stm = DBClass::prepare($sql);
        $stm->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $stm->execute();
        return $stm;
    }
    
    public function findByName($name) {
        $sql = "SELECT * FROM $this->table_name WHERE name = :name";
        $stm = DBClass::prepare($sql);
        $stm->bindParam(':name', $name, PDO::PARAM_STR);
        $stm->execute();
        return $stm;
    }

    public function insert($cpf, $name) {
        $sql = "INSERT INTO $this->table_name (cpf, name) VALUES (:cpf, :name)";
        $stm = DBClass::prepare($sql);
        $stm->bindParam(':cpf', $cpf);
        $stm->bindParam(':name', $name);
        return $stm->execute();
    }
    
    public function update($id, $cpf, $name) {
        $sql = "UPDATE $this->table_name SET name = :name, cpf = :cpf WHERE id = :id";
        $stm = DBClass::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->bindParam(':cpf', $cpf);
        $stm->bindParam(':name', $name);
        return $stm->execute();
    }
    
    public function delete($id) {
        $sql = "DELETE FROM $this->table_name WHERE id = :id";
        $stm = DBClass::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }
}

// $teste = new BlacklistRepository();
// var_dump($teste->insert("09752788602", "renata dias")); die;
// var_dump($teste->update("09752788602", "renata dias")); die;
// var_dump($teste->findAll()); die;