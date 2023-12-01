<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;


class PizzaModel {


    protected $db;

    public function __construct(ConnectionInterface $db) {
        $this->db = $db;
    }


    public function getPizzaList() {

        return $this->db->query(
                'select p.*, k.ar 
                from pizza p
                join kategoria k on k.nev = p.kategorianev
                order by k.ar')->getResult();

    }

    public function getPizza($name) {

        return $this->db->query(
            'select p.*, k.ar 
            from pizza p
            join kategoria k on k.nev = p.kategorianev
            where p.nev = ?', array($name))->getRow();
    }


}