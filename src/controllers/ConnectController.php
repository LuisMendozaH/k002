<?php
namespace src\controllers;

use src\router\Router as Router;

class ConnectController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    protected function handleRequest() {
        print ":D";
    }

}