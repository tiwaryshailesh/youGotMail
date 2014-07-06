<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>YouGotMail</title>
</head>

<body style="margin-top:0px;">
<center>
<?php
session_start();
$c=$_SESSION['campaign'];

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$n=array($_POST['naam0'],$_POST['naam1'],$_POST['naam2'],$_POST['naam3'],$_POST['naam4']);
$e=array($_POST['email0'],$_POST['email1'],$_POST['email2'],$_POST['email3'],$_POST['email4']);


$rec='';
$k=0;
for($i=0;$i<5;$i++)
	{
	$temp=$n[$i].",".$e[$i]."*";
	
	if (strpos($temp,"@"))
		{
			$rec=$rec.$temp;
			$k++;
		}
	
	}

$f=fopen($c.'/Senders.txt','a');

fwrite($f,$rec);
fclose($f);

?>

<img src="pagelogo.jpg"/><br />
<img src="attachfile.png" /><br /><br /><br /><br />
<font face=verdana size=-2><?php 
echo $k." emails added to Senders List";
?></font>
<br /><br />
<form action="summary.php" method="post" enctype="multipart/form-data">
<input type="file" name="uploadedfile" /><br /><br />
<input type="submit" value="Upload File" />
</form>
</center>
</body>
</html>