<?php

namespace App\Controllers;

use App\Models\KategoriaModel;
use App\Models\PizzaModel;

class PizzaListaController extends BaseController {

    public function index() {

        try {

            if ($this->isLoggedIn == false) {
                $this->response->redirect('/login');
                exit();
            }

            $db = \Config\Database::connect();
            $model = new PizzaModel($db);
            $kategoriaModel = new KategoriaModel($db);

            $selectedKategoria = $this->request->getVar('kategoria');
            $term = $this->request->getVar('term');

            $pizzaList = $model->getPizzaList((string) $selectedKategoria, (string) $term);
            $kategoriaList = $kategoriaModel->getKategoriaList();
            

            $session = \Config\Services::session();
            $orderSaved = $session->getFlashdata('orderSaved');
            
            return view('templates/header', array('auth' => $this->getAuthorizeData()))
                . view('templates/navigation')
                . view('homepage', array('pizzaList' => $pizzaList, 'orderSaved' => $orderSaved, 'kategoriaList' => $kategoriaList, 'selectedKategoria' => $selectedKategoria, 'term' => $term))
                . view('templates/footer');

        } catch (\Exception $e) {
            
        }


    }

}