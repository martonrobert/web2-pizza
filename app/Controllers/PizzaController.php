<?php

namespace App\Controllers;

use App\Models\PizzaModel;

class PizzaController extends BaseController {


    public function getPizza($name) {

        try {
            $db = \Config\Database::connect();
            $model = new PizzaModel($db);

            $pizza = $model->getPizza($name);
            
            $this->response->setHeader('Content-Type', 'application/json; charset=utf-8');
            return $this->response->setJSON($pizza);

        } catch (\Exception $e) {
            log_message('error', print_r($e, true));
            $this->response->setStatusCode(500);
            return $this->response->setJSON(array('status' => 'error', 'message' => $e->getMessage()));           
        }          


    }

}