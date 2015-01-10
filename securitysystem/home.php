
<?php


//$usernme = $_REQUEST['name'];
$usernme = "dablessedo";
$req = $_REQUEST['requ'];
if ($req == "makehome") {
echo 'user~~' . $usernme;
include ('conn.php');

$qry = "SELECT * FROM messages where mes_to ='$usernme'";
$result = mysql_query($qry);
if ( mysql_num_rows($result)>0) {
$num =  mysql_num_rows($result);
echo '~~nomes~~'. $num;
}

$qry = "SELECT * FROM alert";
$result = mysql_query($qry);
if ( mysql_num_rows($result)>0) {
$num =  mysql_num_rows($result);
echo '~~alerts~~'. $num;
}

}
?>
