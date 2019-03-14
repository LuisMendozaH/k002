<?php
namespace src\controllers;

use src\router\Router as Router;

interface Account {
    function register();
    function delete();
}

class AccountServiceController extends BaseController implements Account {

    public function __construct() {
        parent::__construct();
    }

    protected function handleRequest() {
        Router::request(Router::LOGIN_ROUTE, function() {
            $this->loadView("login");
        });
        Router::request(Router::SIGNUP_ROUTE, function() {
            $this->loadView("Signup");
        });
        Router::request(Router::GETTING_STARTED_ROUTE, function() {
            $this->loadView("gettingStarted", FALSE);
        });
        Router::request(Router::VERIFY_ACCOUNT_ROUTE, function() {
            $this->loadView("VerifyAccount");
        });
    }

    public function register() {
        
        $this->model = new \src\models\AccountServiceModel();
        $name     = $this->request->post("name");
        $lastname = $this->request->post("lastname");
        $email    = $this->request->post("email");
        $phone    = $this->request->post("phone");
        $password = $this->request->post("password");
        $timestamp= $this->request->post("timestamp");
        $token    = $this->request->post("token"); 

        $result = $this->model->register($name, $lastname, $email, $phone, $password);

    }

    public function verify() {

    }

    public function delete() {
    }

    private function validateEmail() {}
    private function vaidatePassword() {}

}