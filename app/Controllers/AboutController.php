<?php

namespace App\Controllers;


class AboutController extends BaseController {


    public function index() {

        try {           
            return view('templates/header', array('auth' => $this->getAuthorizeData()))
                . view('templates/navigation')
                . view('about')
                . view('templates/footer');

        } catch (\Exception $e) {
            
        }


    }

}