<?php 
include 'include/header.php';
include 'backend/dbconnect.php';
if (!isset($_SESSION['loginuser'])){
?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<br><h1 class="h3 mb-4 text-gray-800 text-center">Register Form</h1>
	
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form method="POST" action="add_register.php" enctype="multipart/form-data">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="user_name" class="form-control">	
				</div>
				<div class="form-group">
					<label>Profile</label>
					<input type="file" name="user_profile" class="form-control-file">		
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="user_email" class="form-control">	
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="user_password" class="form-control">	
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="text" name="user_phone" class="form-control">	
				</div>
				<div class="form-group">
					<label>Address</label>
					<textarea name="user_address" class="form-control"></textarea>	
				</div>
				<div class="form-group">
					<label>Status</label><br>
					<input type="text" name="user_status" class="form-control" value="1">
				</div>
				<div class="form-group">
					<label>Role ID</label>
					<input type="text" name="user_roleid" class="form-control" value="1">	
				</div>	
				<button type="submit" class="btn btn-info btn-user btn-block">Register</button><hr>
					
					<!-- <input type="submit" class="btn btn-outline-primary float-right mb-3" value="Register"> -->
				</form>         		
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
<?php 
include 'include/footer.php';
}else{
	header("location:home.php");
}
?>

