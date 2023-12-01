<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;

class OrderModel {

    protected $db;

    public function __construct(ConnectionInterface $db) {
        $this->db = $db;
    }

    public function getOrderList($isClosed = false, $limit = 50, $offset = 0) {
    
        $sql = 'select o.*, p.vegetarianus, k.ar, p.kategorianev
                from rendeles o
                join pizza p on p.nev = o.pizzanev
                join kategoria k on k.nev = p.kategorianev';

        if ($isClosed == false) {
            $sql .= ' where o.kiszallitas is null';
        }
        else {
            $sql .= ' where o.kiszallitas is not null';
        }

        $sql .= ' order by o.felvetel desc limit ? offset ?';

        return $this->db->query($sql, array($limit, $offset))->getResult();
    }


    public function addOrder($pizza, $quantity) {
        $sql = 'insert into rendeles (az,pizzanev,darab,felvetel,kiszallitas) 
                    values (0,?,?,?,null)';

        $stmt = $this->db->query($sql, array($pizza, $quantity, date('Y-m-d H:i:s')));

        return (int) $this->db->insertID();
    }


    public function setShipped($id) {
        $this->db->query('update rendeles set kiszallitas = ? where az = ?', array(date('Y-m-d H:i:s'), (int)$id));
    }
}