<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>YouGotMail</title>
</head>

<body style="margin-top:0px;">
<center>
<img src="pagelogo.jpg"/><br />
<img src="addtargets.png" /><br /><br /><br /><br />
<font face=verdana size=-2><?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

session_start();
$c=$_SESSION['campaign'];

$target_path = $c."/body/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
    " has been uploaded for campaign body.";
} else{
    echo "There was an error uploading the file, please try again!";
}

?></font>
<br /><br />
<form action="sender.php" method="post">

<input type="text" size="30" value="email" name="email0" onFocus=this.value="";><br>
<input type="text" size="30" value="email" name="email1" onFocus=this.value="";><br>
<input type="text" size="30" value="email" name="email2" onFocus=this.value="";><br>
<input type="text" size="30" value="email" name="email3" onFocus=this.value="";><br>
<input type="text" size="30" value="email" name="email4" onFocus=this.value="";><br><br>

<input type="submit" value="Populate Targets">
</form>
</center>
</body>
</html>