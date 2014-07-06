<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

session_start();
$c=$_SESSION['campaign'];

$target_path = $c."/attachment/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
    " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}

?>
<br><br>
<a href="summary.php">Next</a>
