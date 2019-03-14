<?php
namespace src\user;


interface Account {
    public function register($base);
    function delete();
}

class UserAccount implements Account {

    public function __construct() {
    }

    public function register($base) {
        print_r($base);
    }

    public function delete() {

    }

}