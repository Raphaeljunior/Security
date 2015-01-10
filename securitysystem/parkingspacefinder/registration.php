<?php
//get posted data
include 'connectionManager.php';
include 'requestManager.php';


$idnumber = $_GET['idnumber'];
$citizenname = $_GET['citizenname'];
$phoneNumber = $_GET['phonenumber'];
$email = $_GET['email'];
$password = $_GET['password'];


$newConn = new connectionManager();
$connection = $newConn->Connect();
if ($connection != "err"){
    $regRequest = new requestManager();
    $register = $regRequest->register($connection,$idnumber,$citizenname,$phoneNumber,$email,$password);
    echo json_encode($register);
}
?>