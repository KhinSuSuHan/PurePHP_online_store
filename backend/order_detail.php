<?php 
  include 'include/header.php';
  include 'dbconnect.php';

  $voucherno =$_GET['voucherno'];
  $sql="SELECT orderdetails.*,items.name as item_name FROM orderdetails INNER JOIN items ON orderdetails.item_id=items.id WHERE voucherno=:voucherno";
  $stmt=$pdo->prepare($sql);
  $stmt->bindParam(':voucherno',$voucherno);
  $stmt->execute();
  $orderdetails=$stmt->fetchAll();
  var_dump($orderdetails);
?>

	<div class="container-fluid">
	<!-- Page Heading -->
	 <div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
		<a href="order_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward"></i>Go Back</a>
	 </div>
	</div>

	<?php 
	include 'include/footer.php';
	?>