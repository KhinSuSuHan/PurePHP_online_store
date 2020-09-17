<?php 
include 'dbconnect.php';


$name=$_POST['category_name'];
$photo=$_FILES['category_logo'];
$oldphoto=$_POST['oldphoto'];


echo "$name and $oldphoto<br>";
print_r($photo);

?>