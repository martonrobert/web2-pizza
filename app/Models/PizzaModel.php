<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;


class PizzaModel {


    protected $db;

    public function __construct(ConnectionInterface $db) {
        $this->db = $db;
    }


    public function getPizzaList($kat = '', $term = '') {

        $params = array();
        $sql = 'select p.*, k.ar 
                from pizza p
                join kategoria k on k.nev = p.kategorianev
                where 1 = 1';

        if ($kat !== '') {
            $sql .= ' and k.nev = ?';
            $params[] = $kat;
        }
        if ($term !== '') {
            $sql .= ' and p.nev like ?';
            $params[] = '%'.$term.'%';
        }        
        $sql .= ' order by k.ar';

        return $this->db->query($sql, $params)->getResult();

    }

    public function getPizza($name) {

        return $this->db->query(
            'select p.*, k.ar 
            from pizza p
            join kategoria k on k.nev = p.kategorianev
            where p.nev = ?', array($name))->getRow();
    }


}