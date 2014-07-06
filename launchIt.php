<?php
//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
//error_reporting(-1);
echo "Campaign Initialized";
$c=$_POST[campaign];
session_start();
$_SESSION['campaign']=$c;

mkdir($c,0777,true);
mkdir($c."/attachment",0777,true);
mkdir($c."/body",0777,true);

$f=fopen($c.'/Victims.txt','w');
fclose($f);
$f=fopen($c.'/Senders.txt','w');
fclose($f);


?>
<br><br>
<a href="addSubject.php">Next</a>
