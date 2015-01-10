<?php
$todo = $_POST['todo'];
include ('conn.php');if ($todo == "list"){
$tosearch = $_POST['search'];if (!empty($tosearch)){
$res = mysql_query("SELECT * FROM citizendet WHERE citizenid like '%$tosearch%' or citizenName  like '%$tosearch%'");$row =mysql_num_rows($res);
if ($row == 0){echo 'Citizen: ' . $tosearch . ' not found';}else{
while ($a = mysql_fetch_array($res)){$idno = $a['citizenId'];
$img = '<img STYLE="border:solid 2px;border-radius:500px;border-color:#fff;height:100px;width:100px"  src="img/p.png">';
$name = $a['citizenName'];
echo '<div><a id ="citizenidno" href= "#" name = ' . $idno . ' onclick = "getmore(this.name);">' . $name . '</a></div>';}}}}
if ($todo == "moreinfo"){$idno = $_POST['selectedid'];$ctzn = mysql_query("SELECT * FROM citizendet WHERE citizenId like '%$idno%'");
if ($ctzn){$a = mysql_fetch_array($ctzn);$ctname = $a['citizenName'];$ctphon = $a['phoneNo'];$ctgend = $a['gender'];$ctdob = $a['dob'];$ctocc = $a['occupation'];
$ctcri = $a['crime'];$today = date("Y");$date = DateTime::createFromFormat("d/m/Y",$ctdob);$date->format("Y");$age = 19;
$img = '<img src = "http://www.nanoxcorp.com/securitysystem/img/' . $idno . '.jpg" STYLE="float:left;border:solid 2px;border-radius:500px;border-color:#fff;height:100px;width:100px" src="img/p.png">';
echo $img . '<span style = "color:blue"><br><br><br><br>' . $ctname . '(' . $age . 'yrs)<br>IdNo: ' . $idno . '<br>Gender: ' . $ctgend . '<br>
Occupation: ' . $ctocc . '<br>Phone no: ' . $ctphon . '<br>Crime Record: ' . $ctcri . '</span>';}}
?>