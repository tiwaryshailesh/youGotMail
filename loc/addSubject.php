<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>YouGotMail</title>
</head>

<body style="margin-top:0px;">
<center>
<?php
$c=$_POST['campaign'];
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

<img src="pagelogo.jpg"/><br />
<img src="addsubject.png" /><br /><br /><br /><br />
<font face=verdana size=-2>Campaign Initialized</font>
<br /><br />

<form action="addBody.php" method="post">
<input type="text" size="30" value="Campaign Subject" name="subject" onFocus=this.value="";> 
<input type="submit" value="Add Subject">
</form>

</center>
</body>
</html>

