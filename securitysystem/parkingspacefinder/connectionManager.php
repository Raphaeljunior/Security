<?php
include 'define.php';

class connectionManager {
    private $host,$username, $password,$dbase,$conn,$toReturn;
    function Connect(){
        $this->username = DB_USER;
        $this->username = DB_USER;
        $this->dbase = DB;
        $this->host = HOST;
        //connect to database
        $this->conn = mysqli_connect("localhost","nanoxcor_erick","nyamwaro123","nanoxcor_parkingspacefinder");
    if (!mysqli_connect_error()){
        $this->toReturn = $this->conn;
    }else{
        $this->toReturn = "err";
    }
        return $this->toReturn;
    }
}
?>