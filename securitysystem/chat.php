<?php

$todo = $_POST['todo'];include('conn.php');
//count messages no of messages to 
if ($todo =='count'){
$user = $_POST['username'];
$qry = "SELECT * FROM messages WHERE mes_to ='$user' or mes_from = 'server'";
$result = mysql_query($qry);
$no = mysql_num_rows($result);
//retun the no
if ($result){echo $no;}}
if ($todo == "list"){$user = $_POST['username'];$qry1 = "SELECT * FROM messages WHERE mes_to ='$user'";
$result = mysql_query($qry1);
$head = '<tr color = "blue"><td><b>From</b></td><td><b>To</b></td><td><b>Message</b></td><td><b>Read</b></td></tr></b>';	
if (mysql_num_rows($result) == 0){
echo 'No messages';
}else{

while ($mess = mysql_fetch_array($result)){
//pick details and echo as you loop
$from = $mess['mes_from'];$to = $mess['mes_to'];$message = $mess['message'];$read = $mess['readr'];$time = $mess['timee'];$mesid = $mess['messageid'];
echo '<div style ="border-bottom:2px red;"><a name = "' . $mesid . '" href = "#" onclick = "readMes(this.name)">From: ' . $from . ': Read: ' . $read . '</a></div>';
}}}
if ($todo == "moremesinfo"){
$mesid = $_POST['mesid'];
$res = mysql_query("SELECT * FROM messages WHERE messageid='$mesid'");
if ($res){$b = mysql_fetch_array($res);}
$f = $b['mes_from'];$t = $b['timee'];$d = $b['message'];

echo '<span style = "color:white"><div style = "margin-left:2%;border-radius:10px;margin-top:6%;background:grey;width:70%;float:left">' . $f . ' says: ' . $d . ' time ' . $t . '</div></span>
<div  id = "divreply"  style = "width: 100%;margin-top:2%;padding:2%;float:right;background:white:margin-right:2%;"><textarea id = "txtmessage" style = "border-radius:10px;float:right ;width:70%;"></textarea>
<br><br><br><p align = "right"><input id = "sendtoname" type = "button" name = "' . $f . '" onclick = "send(this.name)" value = "Reply"/></p></div>
</div>';
}
if ($todo == "sendmes"){
$to = $_POST['to'];
$from = $_POST['from'];
$message = $_POST['msg'];
$messageid = $_POST['messageid'];
$read = 'no';
$res = mysql_query("INSERT INTO messages (mes_from,mes_to,message,messageid) VALUES ('$from','$to','$message','$messageid')");
if ($res){
echo 'Message successfully sent to: ' . $to;
//$up = mysql_query("UPDATE messages SET read = 'no' WHERE messageid = '$messageid'");
//if ($up){echo 'Message successfully sent to: ' . $to;}
}else{echo 'An unknown error occured. Message not sent!'.$messageid;}
}
if ($todo == "search"){
$searchid = $_POST['searchid'];
$res = mysql_query("SELECT * FROM user where username like '%$searchid%' or userId ='%$searchid%'");
if ($res){
$row =mysql_num_rows($res);
if ($row == 0){
echo 'User: ' . $searchid . ' not found';
}else{

while ($ro = mysql_fetch_array($res)){
$username = $ro['username'];
//echo'<a href="#" name="'.$username.'" >'.$username.'</a><br>';
echo '<a href="#" name="'. $username .'" onclick="selectto(this.name);">' . $username . '</a><br>';
}}

}else{echo 'Please try again later.';}
}


if ($todo=="componew"){
$to = $_POST['to'];
$message = $_POST['message'];
$messagekey = $_POST['key'];
$from = $_POST['from'];
$read = 'no';
$ins = mysql_query("INSERT INTO messages (mes_from,mes_to,messageid,message) VALUES ('$from','$to','$messagekey','$message')");
if ($ins){
echo 'Message successfully sent to: '.$to;
}else {
echo 'Message cannot be sent at this time';
}


}
?>
