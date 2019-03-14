<?php
namespace src\models;

interface DataBase {
    public function query($sql);
    public function execute($sql);
    public function find_by_sql($sql, $mode = MYSQLI_ASSOC);
}

abstract class BaseModel implements DataBase {

    private $connection;
    private $current_query;

    protected $host = NULL;
    protected $user = NULL;
    protected $pass = NULL;
    protected $name = NULL;

    public function __construct() {
        $this->init();
    }

    public function init() {
        $this->host = "127.0.0.1";
        $this->user = "root";
        $this->pass = "Black.Cat15";
        $this->name = "db_015E";
        $this->connect();
    }

    public function setHost($host) {
        $this->host = $host;
    }
    public function setUser($user) {
        $this->user = $user;
    }
    public function setPassword($password) {
        $this->pass = $password;
    }
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getHost() {return $this->host;}
    public function getUser() {return $this->user;}
    public function getPassword() {return $this->pass;}
    public function getDatabaseName() {return $this->name;}

    public function connect() {
        $success = NULL;
        if ($this->connection = mysqli_connect($this->getHost(), $this->getUser(), $this->getPassword())) {
            $success = (mysqli_select_db($this->connection, $this->name)) ? TRUE : FALSE;
            return $success;
        }
        return $success;
    }
    public function close() {
        if ($this->connection !== NULL) {
            mysqli_close($this->connection);
        }
    }

    public function query($sql) {
        if (!$this->connection) {
            $this->connect();
        }
        
        $this->current_query = $sql;
        $result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

        if (!$result) {
            $this->close();
        }
        return $result;
    }

    public function execute($sql) {
        if (!is_string($sql)) {
            return;
        }
        $result_set = $this->query($sql);
        return $result_set;
    }

    public function find_by_sql($sql, $mode = MYSQLI_ASSOC) {
        if (!is_string($sql)) {
            return;
        }
        $result_set = $this->query($sql);
        $data = [];
        while ($row = mysqli_fetch_array($result_set, $mode)) {
            $data[] = $row;
        }
        return $data;
    }


}