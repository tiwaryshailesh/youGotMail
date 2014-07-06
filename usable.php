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


$victim=array();

$f=$c.'/Victims.txt';
$file_handle = fopen($f, "r");
while (!feof($file_handle)) {
   $line = fgets($file_handle);
   $victim[]=$line;
}
fclose($file_handle);


$senders=array();
$f=$c.'/Senders.txt';

$file_handle = fopen($f, "r");
while (!feof($file_handle)) {
   $line = fgets($file_handle);
   $senders[]=$line;
}
fclose($file_handle);


$dir = $c."/attachment/";
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
           
	if(filetype($dir . $file)=='file')		
	$attachment=$file;
		
        }
	$attachment=$c."/attachment/".$attachment;
        closedir($dh);
    }
}


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

$y=0; 

for($x=0;$x<count($victim);$x++)     
	if (strpos($victim[$x],"@"))	
	{	
	$mail=new PHPMailer();

        $mail->Subject = $subject;
        $mail->MsgHTML(file_get_contents('contents.html'), dirname(__FILE__));
        $mail->AltBody = 'This is a plain-text message body';
        $mail->AddAttachment('images/phpmailer_mini.gif');

        $a=explode(",",$senders[$y]);

        $mail->SetFrom($a[1], $a[0]);
        $mail->AddAddress($victim[$x]);	
	
        $y++;
        if ($y=count($senders))
		$y=0;

	echo "From: [".$a[1]."] ".$a[0]."<br>";
	echo "To: [".$victim[$x]."<br>";
	echo "Subject: ".$subject."<br>";
        echo "Body File: ".$body."<br>";
        echo "Attachment: ".$attachment."<br><br>";



	if(!$mail->Send()) 
	  	echo "Mailer Error: " . $mail->ErrorInfo;
	else 
                echo "Message sent to ".$victim[$x]."<br><br><br><br>";

        $mail->ClearAddresses();

        
        }

        


?>
					