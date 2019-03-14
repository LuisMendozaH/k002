<?php
namespace src\controllers;

use \src\controllers\ViewController as ViewController;

use \src\http\Request as Request;
use \src\http\HttpHandler as HttpHandler;

use \src\user\UserAccount as Account;

use \src\translate\TranslateManager as TranslateManager;

/**
 * BaseController class
 * @author Luis Antonio <luis.antonioxyz@gmail.com>
 */

abstract class BaseController {
    /**
     * @var object $user
     * @access protected
     */
    protected $user;
    /**
     * @var object $view instance of the ViewController class
     * @access protected
     */
    protected $view;
    /**
     * @var object $model
     * @access protected
     */
    protected $model;
    /**
     * @var object $request
     * @access protected
     */
    protected $request;
    /**
     * @var object $translate
     * @access protected
     */
    protected $translate;
    /**
     * @var object $data
     * @access protected
     */
    protected $client_data;

    public function __construct() {
        $this->user = new Account();
        $this->view = new ViewController();
        $this->translate = new TranslateManager();
        $this->request = new Request();
        $this->init();

        $this->client_data = ["user" => $_SESSION, "translate" => $this->translate->getTranslations()];
        $this->handleRequest();

    }

    protected function init() {
        $this->translate->initLanguageTranslation("es");
    }

    /**
     * Receive and handle incoming requests
     * example: /login/
     *          /signup/
     */
    abstract protected function handleRequest();

    /**
     * Loads a view
     * @param string $view the view
     */
    public function loadView($view, $strict = FALSE) {

        $view_path = '../src/views/';
        $view_name = ($strict) ? ucfirst($view) : $view;
        $view_name .= 'View' . '.php';
        $view = $view_path . $view_name;

        if (file_exists($view)) {
            require_once $view;
        }
    }
}