<?php

function showtime($posted){
$now=time();
$diff=$now-$posted;
$el=round($diff/60);
if($el<1){
$show="Just Now";
}else{
if($el==1){
$show="1 minute ago";
}else{
if($el>1&&$el<60){
$show=$el.' minutes ago';
}else{
if($el>=60){
$hr=round($el/60);
if($hr==1){
$show=$hr.' hour ago';
}else{
if($hr<24){

$show=$hr.' hours ago';
}else{

if($hr>=24){
$d=round($hr/24);
if($d==1){
$show=$d.' day ago';
}else{
if($d>1&$d<7){
$show=$d.' days ago';
}else{
if($d>=7&$d<28){
$w=round($d/7);
$show=$w.' weeks ago';
}else{
if($d>=28){
$mm=round($d/28);
$show=$mm.' months ago';}
}
}
}
}
}
}
}
}
}
}
return $show;
}
?>

