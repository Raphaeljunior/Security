<?php
//the shit begins
$todo = $_POST['todo'];
include ('conn.php');
if ($todo == "login"){
$usernme = $_POST['username'];
$passwrd = $_POST['password'];
$qry = "SELECT password FROM user WHERE username = '$usernme'";
$result = mysql_query($qry);
$num = mysql_num_rows($result);
if ($num == 0){//this is a useless person how can he just try the patience of my code
echo "Wrong username/password combination";exit();
}$rows = mysql_fetch_array($result);$real_pass = $rows['password'];
if ($real_pass == $passwrd){$dat = '<br><br><a href="main.html" data-role="button" id="" data-theme="c" data-inline="false" style = "height:40px;width:130px;" rel="external"><input type="button" value = "Go home"/></a></center><br><br>';
echo '<center>Login successful.<br>' . $dat . '</center>';
}else {echo "Wrong username and password combination";}}
//signup code
if ($todo == "signup"){
//pickn the crappy shiity posts i hate posting
$usernme = $_POST['username'];
$passwrd = $_POST['password'];
$usertyp = $_POST['usertype'];
$useridn = $_POST['id'];
$aboutme = $_POST['aboutme'];
//querying doing wat i do best...querying
$qry = "SELECT * FROM citizendet WHERE citizenId ='$useridn'";
$num = mysql_num_rows(mysql_query($qry));
if ($num==0){echo '<span style="color:red">Invalid ID no.</span>';}
else {
$ro = mysql_fetch_array(mysql_query($qry));//arrays...i hate then i will come up with sth to replace arrays..
if ($ro['occupation'] != $usertyp){echo '<span style="color:red">The usertype selected is invalid</span>';} else{
$qry2 = "SELECT * FROM user WHERE userId = '$useridn'";
$num1 = mysql_num_rows(mysql_query($qry2));
$qry3 = "INSERT INTO user (username , password , userType , userId , aboutUser) VALUES ('$usernme','$passwrd','$usertyp','$useridn','$aboutme')";
$execute = mysql_query($qry3);

if ($execute){
echo 'You have successfully been registered';}else{echo 'Unknown error occured during registration.';}
}}}
?>
