<?php

namespace App\Controllers;

use App\Models\PizzaModel;

class HomePageController extends BaseController {

    public function index() {

        try {
            $db = \Config\Database::connect();
            $model = new PizzaModel($db);

            $pizzaList = $model->getPizzaList();
            
            return view('templates/header')
                . view('templates/navigation')
                . view('homepage', array('pizzaList' => $pizzaList))
                . view('templates/footer');

        } catch (\Exception $e) {
            
        }


    }

}