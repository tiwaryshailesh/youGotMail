<?php

$logfile='l.html';
$ip=$_SERVER['REMOTE_ADDR'];
$page=$_SERVER['REQUEST_URI'];
$ref=$_SERVER['HTTP_REFERER'];
date_default_timezone_set('Asia/Kolkata');

$date_time=date("l j F Y  g:ia",time());
$agent=$_SERVER['HTTP_USER_AGENT'];

$f=fopen('l.html','a');
$m="<b>Date Time : </b>".$date_time."<br><b>IP Address : </b>".$ip."<br><b>Requested Resource : </b>".$page."<br><b>Browser Details :</b> ".$agent."<br><br><br>";
fwrite($f,$m);
flcose($f);

echo "[!]";
?>
