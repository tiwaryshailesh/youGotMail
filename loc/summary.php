<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>YouGotMail</title>
</head>

<body style="margin-top:0px;">
<center>
<img src="pagelogo.jpg"/><br />
<img src="summary.png" /><br /><br /><br /><br />
<font face=verdana size=2>
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


echo $k." emails added to Senders List";
?>

</font>
<br /><br />
<?php echo "<a href='mail.php?campaign=".urlencode($c)."'>"; ?><img src="launchBig.png" /></a><br /><br /><br />


<?php

echo "<b>Campaign Name</b><br>";
echo $c."<br><br>";

$f=$c.'/Subject.txt';
echo "<b>Subject</b><br>";
$file_handle = fopen($f, "r");
while (!feof($file_handle)) {
   $line = fgets($file_handle);
   echo $line;
}
fclose($file_handle);

$f=$c.'/Victims.txt';
echo "<br><br><b>Targetting</b><br>";
$file_handle = fopen($f, "r");
while (!feof($file_handle)) {
   $line = fgets($file_handle);
   $kk=$line;
}
$k=explode(",",$kk,-1);
for ($x=0;$x<count($k);$x++)
   echo $k[$x]."<br>";

fclose($file_handle);

$f=$c.'/Senders.txt';
echo "<br><b>Senders List</b></br>";
$file_handle = fopen($f, "r");
while (!feof($file_handle)) {
   $line = fgets($file_handle);
   $kk=$line;
}

$k=explode("*",$kk,-1);
for ($x=0;$x<count($k);$x++)
   echo $k[$x]."<br>";

fclose($file_handle);


echo "<br><br><b>Body</b><br>";
$dir = $c."/body/";
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
           
	if(filetype($dir . $file)=='file')		
	echo "$file \n";
		
        }
        closedir($dh);
    }
}


?>
<br><br><br>


</center>
</body>
</html>