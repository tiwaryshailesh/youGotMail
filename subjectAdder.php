<?php

session_start();
$c=$_SESSION['campaign'];

$sub=$_POST[subject];
$f=fopen($c.'/Subject.txt','w');
fwrite($f,$sub);
fclose($f);

?>

<html>

<head>

</head>
<body>
<h1>Subject</h1><br>
<?php 
echo "[".$sub."] added as campaign subject";
?>

<br><br>
<a href="addBody.php">Next</a>
</body>

