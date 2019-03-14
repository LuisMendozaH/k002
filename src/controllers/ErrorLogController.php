<?php
namespace src\controllers;

use src\router\Router as Router;

class ErrorLogController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    protected function handleRequest() {
        $this->loadView("ErrorLog");
    }

}