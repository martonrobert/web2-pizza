<?php

namespace App\Controllers;

use App\Models\MnbModel;

class MnbController extends BaseController {

    public function index() {

        try {

                $model = new MnbModel();
                $rates = $model->getCurrencyRates();
                
                return view('templates/header', array('auth' => $this->getAuthorizeData()))
                    . view('templates/navigation', array('auth' => $this->getAuthorizeData()))
                    . view('arfolyamok', array('data' => $rates))
                    . view('templates/footer');

        } catch (\Exception $e) {
            
        }


    }

}