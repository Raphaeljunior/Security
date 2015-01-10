<?php
include 'conn.php';
$todo = $_GET['todo'];

if ($todo == 'picklocations'){
$qry = "SELECT * FROM geodata";
$check = mysql_query($qry);
if ($check){
 while ($a = mysql_fetch_array($check)){
$lat = $a['latitude'];
$lng = $a['longitude'];
$person = $a['citizenName'];
echo $person . '~~~' . $lat . '~~~' . $lng . '~^!';
}
}else{echo 'An error just occured';}
}

?>
