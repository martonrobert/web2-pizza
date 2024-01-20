<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController {


    public function login() {

        try {
            $db = \Config\Database::connect();
            $model = new UserModel($db);

            if($this->request->getMethod() == 'post') {
                $uname = $this->request->getVar('uname');
                $pwd = $this->request->getVar('pwd');

                $user = $model->login($uname, $pwd);
                if($user) {
                    log_message('error', print_r($user, true));
                    $token = $model->createUserToken($user);

                    helper('cookie');
                    set_cookie('pizza-ssid',$token->token_str, 36000, 'pizza.martonrobert.hu'); 
                    $this->response->redirect('/');                     
                }
            }

            return view('templates/header', array('auth' => $this->getAuthorizeData()))
                    . view('templates/navigation')
                    . view('loginpage')
                    . view('templates/footer');                

        } catch (\Exception $e) {
            log_message('error', print_r($e, true));
            return view('templates/header', array('auth' => $this->getAuthorizeData()))
                    . view('templates/navigation')
                    . view('loginpage', array('error' => $e->getMessage()))
                    . view('templates/footer');          
        }  


    }


    public function logout() {
        try {
            helper('cookie');
            $db = \Config\Database::connect();
            $model = new UserModel($db);
            $token = get_cookie('pizza-ssid');

            if ($token) {
                $model->removeUserToken($token);
                delete_cookie('pizza-ssid', 'pizza.martonrobert.hu');
            }
            
            $this->response->redirect('/');
        } 
        catch (\Exception $e) {
            log_message('error', print_r($e, true));
            redirect()->route('/');
        }        
    }

}