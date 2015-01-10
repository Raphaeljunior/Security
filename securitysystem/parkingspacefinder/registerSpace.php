<?php
//get posted data
include 'connectionManager.php';
include 'requestManager.php';
$spaceName = $_GET['spacename'];
$price = $_GET['price'];
$lat = $_GET['latitude'];
$lng = $_GET['longitude'];
$noofspaces = $_GET['noofspaces'];

$newConn = new connectionManager();
$connection = $newConn->Connect();
if ($connection != "err"){
    $regRequest = new requestManager();
    $register = $regRequest->RegisterSpace($connection,$spaceName,$price,"",$lat,$lng,$noofspaces);
    echo json_encode($register);
}
?>