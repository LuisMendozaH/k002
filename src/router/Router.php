<?php
namespace src\router;

class Router {

    const LOGIN_ROUTE = 'login';
    const SIGNUP_ROUTE = 'signup';

    const ABOUT_ROUTE = 'about';

    const GETTING_STARTED_ROUTE = 'gettingStarted';
    const VERIFY_ACCOUNT_ROUTE = 'verify';

    const AJAX_ADMIN_REGISTRATION = 'register_admin';

    public static $routes = [
        "index", "ajax", "connect", "about", "AccountService", "ErrorLog"
    ];

    public static function request($route, $callback) {
        $url = self::getRoute();
        if ($url == $route) {
            $callback->__invoke();
        }
    }

    public static function getRouteCount() {
        $url = isset($_GET['url']) ? $_GET['url'] : FALSE;
        if (!$url) {
            return NULL;
        }
        return count(explode('/', $url)) -1;
    }

    public static function getRoute() {
        $url = isset($_GET['url']) ? $_GET['url'] : FALSE;
        $url = explode('/', $url);
        array_shift($url);
        if (count($url) > 0) {
            return $url[0];
        }
    }

    public static function getRouteByName($route) {
        $url = isset($_GET['url']) ? $_GET['url'] : FALSE;
        if (!$url) {
            return NULL;
        }
        $url = explode('/', $url);
        array_shift($url);
        return $url[$route];
    }
    
    public static function validRoute($route) {
        return in_array($route, Router::$routes);
    }
}

?>