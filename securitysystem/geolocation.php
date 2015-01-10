<?php
include ('conn.php');
$todo = $_POST['todo'];
if ($todo == 'savelocation'){
$person = $_POST['user'];
$latitude = $_POST['lat'];$longitude = $_POST['lng'];
$altitude = $_POST['alt'];$accuracy = $_POST['acc'];
$altAcc = $_POST['aac'];$heading = $_POST['hea'];
$speeding = $_POST['spe'];$timeStamp = $_POST['tim'];
//SELECT * FROM citizendet WHERE citizenId ='$useridn'";
$qry = "SELECT * FROM geodata WHERE citizenName ='$person'";
$check = mysql_query($qry);
if ($check){
if (mysql_num_rows($check) != 0){
$update = mysql_query("UPDATE geodata SET latitude ='$latitude',longitude = '$longitude', altitude = '$altitude', accuracy ='$accuracy', altitudeAccuracy = '$altAcc', heading = '$heading', speed = '$speeding', timeStamp = '$timeStamp' WHERE citizenName='$person'");
if ($update){echo 'Updating location information..';}else{echo 'Failed updating location information..';}
}else{
$insert = mysql_query("INSERT INTO geodata (citizenName,latitude,longitude,altitude,accuracy,altitudeAccuracy,heading,speed,timeStamp) VALUES ('$person','$latitude','$longitude','$altitude','$accuracy','$altAcc','$heading','$speeding','$timeStamp')");
if ($insert){echo 'Location saved..';}else{echo 'Error coud not save location';}}
}
else{echo 'Unknown Error:504';}
}

if ($todo == 'picklocation'){
$person = $_POST['citizenName'];
$qry = "SELECT * FROM geodata WHERE citizenName ='$person'";
$check = mysql_query($qry);
if ($check){
$a = mysql_fetch_array($check);
$lat = $a['latitude'];
$lng = $a['longitude'];
echo $person . '~~~' . $lat . '~~~' . $lng;
}else{echo 'An error just occured';}
}


if ($todo == 'picklocations'){
$qry = "SELECT * FROM geodata";
$check = mysql_query($qry);
if ($check){
$a = mysql_fetch_array($check);
$lat = $a['latitude'];
$lng = $a['longitude'];
$person = $a['citizenName'];
echo $person . '~~~' . $lat . '~~~' . $lng . '~^!';
}else{echo 'An error just occured';}
}
?>