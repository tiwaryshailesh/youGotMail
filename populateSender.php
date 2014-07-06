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

<html>

<head>

</head>
<body>
<h1>Senders List</h1><br>
<?php 
echo $k." emails added to Senders List";
?>


</body>
<br><br>
<a href="addAttachment.php">Next</a>
