<?php
if (!empty($_REQUEST['name']) || (!empty($_REQUEST['pwod']))){
$usernme = $_REQUEST['name'];
$passwrd = $_REQUEST['pwod'];
include ('conn.php');




$qry = "SELECT password FROM user WHERE username = '$usernme'";
$result = mysql_query($qry);
$num = mysql_num_rows($result);
if ($num == 0){
echo 'info~~Wrong username/password combination.';
exit();
}
$rows = mysql_fetch_array($result);
$real_pass = $rows['password'];
if ($real_pass == $passwrd){
echo 'success~~Correct username and password combination';
//header("location: mainaa.html");
}
else {
echo 'info~~Wrong username and password combination';
}
} 
else {
echo 'info~~Enter your login details.';
exit();
}
?>
