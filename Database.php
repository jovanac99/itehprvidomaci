<?php

class Database
{
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $database = "doktor_ustanova";
    public $conn;

    function __construct($db)
    {
        $this->database = $db;
        $this->connect();
    }

    function connect()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database);
    }
}
