<?php 
include 'include/header.php';
include 'dbconnect.php';

$id=$_GET['id'];

$sql="SELECT * FROM categories WHERE id=:id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$category=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800 text-center">
	Category Edit</h1>
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form method="POST" action="updatecategory.php" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?=$category['id']?>">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="category_name" 
					class="form-control" value="<?=$category['name']?>">	
				</div>
				<div class="form-group">
					<label>Photo</label>
					<input type="file" name="category_logo" 
					class="form-control-file">
					<img src="<?=$category['photo']?>" width="200" height="120"
					class="mt-3">
					<input type="hidden" name="oldphoto" value="<?=$category['photo']?>">
				</div>
					<input type="submit" class="btn btn-outline-primary float-right mb-3" value="Update">		
			</form>         		
		</div>
	</div>
</div>
<!-- /.container-fluid -->
<?php 
include 'include/footer.php';
?>
