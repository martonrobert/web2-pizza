<?php

namespace App\Controllers;

class ContactController extends BaseController {


    public function index() {

        try {           
            return view('templates/header')
                . view('templates/navigation')
                . view('contact_us')
                . view('templates/footer');

        } catch (\Exception $e) {
            
        }


    }

}