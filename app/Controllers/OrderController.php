<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\PizzaModel;


class OrderController extends BaseController {


    /**
     * Rendelések listázása
     * 
     * @return string
     */
    public function getOrdersList() {

        try {
            if ($this->isLoggedIn == false) {
                $this->response->redirect('/login');
                exit();
            }

            $db = \Config\Database::connect();
            $model = new OrderModel($db);

            $closed = $this->request->getVar('closed');
            $limit = 50;
            $offset = 0;

            $orderList = $model->getOrderList((int) $closed, $limit, $offset);

            $session = \Config\Services::session();
            $orderSaved = $session->getFlashdata('orderSaved');
            
            $viewData = array('closed' => $closed, 'limit' => $limit, 'offset' => $offset);

            return view('templates/header', array('auth' => $this->getAuthorizeData()))
                . view('templates/navigation')
                . view('orderspage', array('orderList' => $orderList, 'viewData' => $viewData, 'orderSaved' => $orderSaved))
                . view('templates/footer');

        } catch (\Exception $e) {
            
        }        

    }


    public function newOrder($name) {
        try {

            if ($this->isLoggedIn == false) {
                $this->response->redirect('/login');
                exit();
            }

            $db = \Config\Database::connect();
            $model = new PizzaModel($db);

            $pizza = $model->getPizza($name);
            
            $orderData = array(
                'order' => (object) array('id' => null, 'quantity' => 1),
                'pizza' => $pizza
            );
            
            return view('templates/header', array('auth' => $this->getAuthorizeData()))
                . view('templates/navigation')
                . view('neworderpage', $orderData)
                . view('templates/footer');

        } catch (\Exception $e) {
            
        }          
    }

    public function setOrder() {
        try {
            $db = \Config\Database::connect();
            $model = new OrderModel($db);

            $nev = $this->request->getVar('nev');
            $quantity = $this->request->getVar('quantity');

            if ((string) $nev !== '' and (int) $quantity > 0) {
                $orderId = $model->addOrder($nev, $quantity);
                $session = \Config\Services::session();
                $session->setFlashdata('orderSaved', 'A rendelés rögzítése sikeresen megtörtént. (ID: ' . $orderId . ')');
            }
            
            
            header('Location: http://pizza.martonrobert.hu');
            exit();
        } catch (\Exception $e) {
            
        }
    }


    public function setOrderShipped($id) {
        try {
            $db = \Config\Database::connect();
            $model = new OrderModel($db);

            $model->setShipped($id);

            $session = \Config\Services::session();
            $session->setFlashdata('orderSaved', 'A kiszállítás rögzítése sikeresen megtörtént. (ID: ' . $id . ')');

            exit();
        } catch (\Exception $e) {
            
        }        
    }

}