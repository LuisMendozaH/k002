<?php
namespace src\controllers;

class IndexController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    protected function handleRequest() {
        $this->loadView("Index");
    }

}