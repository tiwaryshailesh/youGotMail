<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>YouGotMail</title>
</head>

<body style="margin-top:0px;">
<center>
<img src="pagelogo.jpg"/><br />
<img src="addsenders.png" /><br /><br /><br /><br />
<font face=verdana size=-2><?php
session_start();
$c=$_SESSION['campaign'];
$e=array($_POST[email0],$_POST[email1],$_POST[email2],$_POST[email3],$_POST[email4]);

$rec='';
$k=0;
for($i=0;$i<5;$i++)
	{
	$temp=$e[$i];
	if (strpos($temp,"@"))
		{
			$rec=$rec.$temp.',';
			$k++;
		}
	
	}

$f=fopen($c.'/Victims.txt','a');
fwrite($f,$rec);
fclose($f);

echo $k." emails added to Victims List";

?></font>
<br /><br />
<form action="summary.php" method="post">

<input type="text" size="30" value="Name" name="naam0" onFocus=this.value="";> <input type="text" size="30" value="email" name="email0" onFocus=this.value="";><br>
<input type="text" size="30" value="Name" name="naam1" onFocus=this.value="";> <input type="text" size="30" value="email" name="email1" onFocus=this.value="";><br>
<input type="text" size="30" value="Name" name="naam2" onFocus=this.value="";> <input type="text" size="30" value="email" name="email2" onFocus=this.value="";><br>
<input type="text" size="30" value="Name" name="naam3" onFocus=this.value="";> <input type="text" size="30" value="email" name="email3" onFocus=this.value="";><br>
<input type="text" size="30" value="Name" name="naam4" onFocus=this.value="";> <input type="text" size="30" value="email" name="email4" onFocus=this.value="";><br><br>


<input type="submit" value="Populate Senders">
</form>
</center>
</body>
</html>
