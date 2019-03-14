<?php
namespace src\utils;

class CSecure {

    private static function rand_secure($min, $max, $unique = FALSE) {
       $range = $max - $min;
       if ($range < 1) return $min;
       
       $log    = ceil(log($range, 2));
       $bytes  = (int) ($log / 8) + 1;
       $bits   = (int) $log + 1;
       $filter = (int) (1 << $bits) - 1;

       do {
           $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
           $rnd = $rnd & $filter;
       } while($rnd > $range);
       return $min + $rnd;
    }

    public static function generateToken($length) {
        $token = "";
        $codeAlphabet  = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet);

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[self::rand_secure(0, $max-1)];
        }
        return $token;
    }
}