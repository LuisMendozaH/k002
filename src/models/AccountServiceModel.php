<?php
namespace src\models;

use \src\http\HttpHandler as Http;

use \src\utils\CString as CString;
use \src\utils\CSecure as CSecure;

class AccountServiceModel extends BaseModel {
 
    public function __construct() {
        parent::__construct();
    }
    
    public function register($firstname, $lastname, $email, $phone, $password) {

        $code = "";
        $token = CSecure::generateToken(100);

        $firstname = $this->sanitize($firstname);
        $lastname = $this->sanitize($lastname);

        $sql =  "INSERT INTO hotel_admin ";
        $sql .= "(code, first_name, last_name, email,";
        $sql .= " passwd, phone, account_token) VALUES ";
        $sql .= "('{$code}', '{$firstname}', '{$lastname}', '{$email}', ";
        $sql .= "'{$password}', '{$phone}', '{$token}');";
        
        $data = $this->execute($sql);
        $response = [];

        if ($data) {
            $response = ["entries" => ["continue" => Http::getHost(FALSE, FALSE) . "/AccountService/gettingStarted?cli=0"]];
        }

        Http::setHeader(NULL, ["xhr"]);
        print json_encode($response);
    }

    public function sanitize($text) {
        $text = CString::removeUnicodeSymbols($text);
        $text = CString::removeUnicodeSpace($text);
        return $text;
    }

}