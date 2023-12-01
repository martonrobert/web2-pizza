<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class KategoriaModel {


    protected $db;

    public function __construct(ConnectionInterface $db) {
        $this->db = $db;
    }


    public function getKategoriaList() {

        return $this->db->query(
                'select * 
                from kategoria
                order by nev')->getResult();

    }


}