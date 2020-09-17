<?php 

include 'backend/dbconnect.php';

$name=$_POST['user_name'];
$profile=$_FILES['user_profile'];
$email=$_POST['user_email'];
$password=$_POST['user_password'];
$phone=$_POST['user_phone'];
$address=$_POST['user_address'];
$status=$_POST['user_status'];
$role_id=$_POST['user_roleid'];

/*echo "$name and $password";die();*/
$basepath="images/users/";
$fullpath=$basepath.$profile['user_profile'];
move_uploaded_file($profile['tmp_name'],$fullpath);

$sql="INSERT INTO users(name,profile,email,password,phone,address,status,role_id) VALUES (:user_name,:user_profile,:user_email,:user_password,:user_phone,:user_address,:user_status,:user_roleid)";

$stmt=$pdo->prepare($sql);
$stmt->bindParam(':user_name',$name);
$stmt->bindParam(':user_profile',$profile);
$stmt->bindParam(':user_email',$email);
$stmt->bindParam(':user_password',$password);
$stmt->bindParam(':user_phone',$phone);
$stmt->bindParam(':user_address',$address);
$stmt->bindParam(':user_status',$status);
$stmt->bindParam(':user_roleid',$role_id);

$stmt->execute();

if ($stmt->rowCount()) {
	header("location:register.php");
}else{
	echo "Error";
}
?>
