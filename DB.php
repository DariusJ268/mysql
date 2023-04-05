<?php
class DB{
    public $conn;

    public function __construct(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "221214_books";
        $this->conn = new mysqli($servername, $username, $password, $db);
    }
}

?>