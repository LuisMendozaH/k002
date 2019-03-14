<?php
namespace src\http;

class Request {
    public static function get($key) {
        return array_key_exists($key, $_GET) ? $_GET[$key] : NULL;
    }
    public static function post($key) {
        return array_key_exists($key, $_POST) ? $_POST[$key] : NULL;
    }
    public function getLanguage() {
        return array_key_exists("HTTP_ACCEPT_LANGUAGE", $_SERVER) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : "es";
    }
}