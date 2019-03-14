<?php
namespace src\controllers;

use src\router\Router as Router;

class AjaxController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    protected function handleRequest() {
        Router::request(Router::AJAX_ADMIN_REGISTRATION, function() {
            AjaxController::handleAdminRegistration($this);
        });
    }

    private static function handleAdminRegistration($global) {
        $accountService = new \src\controllers\AccountServiceController();
        $accountService->register();
    }

}