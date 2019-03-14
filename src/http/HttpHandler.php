<?php
namespace src\http;

class HttpHandler {

    public static function getProtocol() {
        return (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] || $_SERVER["SERVER_PORT"] == "443") ? "https://" : "http://";
    }

    public static function getHost($encode = FALSE, $short = FALSE) {
        $protocol = self::getProtocol();
        $host = $protocol . $_SERVER["HTTP_HOST"];

        $host = ($encode) ? urlencode($host) : $host;
        $host = ($short)  ? preg_replace("/(https|http)\:\/\//", "", $host) : $host;
        return $host;
    }

    public function getCurrentURI($encode = FALSE) {
        $protocol = self::getProtocol();
        $url = $protocol . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        $url = ($encode) ? urlencode($url) : $url;
        return $url;
    }

    public static function setHeader($header, $type = "") {

        $protocol = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] || $_SERVER["SERVER_PORT"] == "443") ? "https://" : "http://";
        $host = $protocol.$_SERVER["HTTP_HOST"];

        if (in_array("xhr", $type)) {
            header("Access-Control-Allow-Credentials:true");
            header("Access-Control-Allow-Method:OPTIONS");
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Expose-Headers: Content-Length, Content-Type, X-Response-Type, X-Auth-Method, X-Auth-Key, X-Login-Method");
        }

        if (in_array("protect", $type)) {
            header("X-Content-Type-Options: nosniff");
            header("X-Frame-Options: SAMEORIGIN");
            header("X-XSS-Protection:1; mode=block");
        }

        if ($header) {
            header($header);
        }
    }

}