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

$sub=$_POST[subject];
$f=fopen($c.'/Subject.txt','w');
fwrite($f,$sub);
fclose($f);

?>

<img src="pagelogo.jpg"/><br />
<img src="addbody.png" /><br /><br /><br /><br />
<font face=verdana size=-2><?php 
echo "[".$sub."] added as subject";
?></font>
<br /><br />
<form action="victim.php" method="post" enctype="multipart/form-data">
<input type="file" name="uploadedfile" /><br /><br />
<input type="submit" value="Upload File" />
</form>
</center>
</body>
</html>