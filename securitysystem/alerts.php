<?php

$todo = $_POST['todo'];
include('conn.php');

if ($todo =='count'){
$qry = "SELECT * FROM alert";
$result = mysql_query($qry);
$no = mysql_num_rows($result);
if ($result){
echo $no;}}
//end if count
//start reply

if ($todo == "list"){
$list = mysql_query("SELECT * FROM alert");
if ($list) {
while ($b = mysql_fetch_array($list)){
$alertCode = $b['alert_code'];
$alertContent = $b['alert_content'];
$alertFrom = $b['alert_from'];
$expiryTime = $b['expiryTime'];
$timeOfAlert = $b['timeOfAlert'];
$time = time($b['timeOfAlert']);
//$time = $b['timeOfAlert'] -> format('h:i:s');

//echo $alertCode . '~~~' . $alertContent . '~~~' . $alertFrom . '~~~' . $expiryTime . '~~~' . $timeOfAlert . "~~^";
echo '<a href="#" name = "'. $alertCode .'" onClick = "readAlert(this.name)">From: ' . $alertFrom . '>> ' . $alertContent .'</a><br>';
}
}else{
echo "Sorry could not get the alerts at the moment. Please try some other time!";
}
}
if ($todo == "morealertsinfo"){
$id = $_POST['alertid'];

$det= mysql_query("SELECT * FROM alert where alert_code = '$id'");
if ($det){
$ro = mysql_fetch_array($det);
$from = $ro['alert_from'];
$content = $ro['alert_content'];
$time = $ro['timeOfAlert'];
echo  '<span style = "color:white"><div style = "border-radius:10px;margin-top:1%;background:grey;width:100%;float:left">From: '.$from . '<br><br>Content: ' . $content . '<br><br>Time of alert: ' . $time.'</div></span>';
}



}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
$location = $_GET['loc'];
$from = "server";
$cont = "New crime has occured at: ".$location;
$rn =rand(100000, 100000000);
$insert= mysql_query("insert into alert (alert_code,alert_content,alert_from) values ('$rn','$cont','$from')");
if ($insert){
echo 'Alert successfully sent to: ';
}
else{
echo 'Could not send alert to: ';
}
}




?>