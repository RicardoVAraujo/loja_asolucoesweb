<?php

namespace App\Models;

use App\Models\Database\TypeDatabase\TypePdoDatabase;
use App\Models\Database\TypeDatabase\TypeDatabase;

class Models {

    private $typeDatabase;

    public function __construct() {
        $database = new TypeDatabase(new TypePdoDatabase);
        $this->typeDatabase = $database->getDatabase();
    }

    public function fetchAll() {
        $sql = "SELECT * FROM {$this->table}";
        $this->typeDatabase->prepare($sql);
        $this->typeDatabase->execute();
        return $this->typeDatabase->fetchAll();
    }

    //select * from tabela produtos where categoria = 1
    public function find($fields, $value, $fetch = null) {
        $sql = "SELECT * FROM {$this->table} WHERE $fields = ?";
        $this->typeDatabase->prepare($sql);
        $this->typeDatabase->bindValue(1, $value);
        $this->typeDatabase->execute();

        return ($fetch == null) ? $this->typeDatabase->fetch() : $this->typeDatabase->fetchAll();
    }

}
