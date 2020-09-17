<?php 
include 'include/header.php';
if (!isset($_SESSION['loginuser'])){
?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<br><h1 class="h3 mb-4 text-gray-800 text-center">Login Form</h1>
	
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form method="POST" action="signin.php" enctype="multipart/form-data">
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="user_email" class="form-control">	
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="user_password" class="form-control">	
				</div>
				<div class="form-group">		
					<input type="submit" class="btn btn-outline-primary float-right mb-3" value="Login">
				</div>
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


