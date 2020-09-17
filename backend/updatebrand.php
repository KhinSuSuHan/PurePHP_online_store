<?php 
include 'dbconnect.php';

$name=$_POST['brand_name'];
$logo=$_FILES['brand_logo'];
$oldphoto=$_POST['oldphoto'];

echo "$name and $oldphoto<br>";
print_r($logo);

?>