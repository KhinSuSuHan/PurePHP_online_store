<?php 
include 'include/header.php';
include 'backend/dbconnect.php';

$sql="SELECT items.*,brands.name as brand_name,subcategories.name as 
sub_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id LIMIT 8";

$stmt=$pdo->prepare($sql);
$stmt->execute();
$items=$stmt->fetchAll();
?>

<div class="container-fluid">
	<img src="images/main-img.jpg" height="200px" class="img-fluid my-3">
</div>

<!-- new arrival -->
<div id="new-arrival">
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-7 text-center">
				<h1 class="text-uppercase">new arrival</h1>	
			</div>
		</div>
		<div class="row">

			<?php 
			foreach ($items as $item) {
				?>
				<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 my-3">
					<div class="card">
						<div class="inner">
							<img class="card-img-top" src="backend/<?=$item['photo']?>" alt="Card image cap">
							<!-- <div class="card-block">
								<a href="" class="btn btn-info btn-lg btn-block"><i class="icofont-cart-alt"></i>&nbsp;Add to cart</a>
							</div> -->
						</div>
						<div class="container-fluid p-0 m-0">
							<div class="row text-center p-0 m-0">
								<div class="col-md-6 item-bg mt-1">
									<a href="" class="text-decoration-none text-dark item-save">
										<i class="fas fa-heart fa-lg py-3"></i>
									</a>	
								</div>
								<div class="col-md-6 item-bg mt-1">
									<a href="javascript:void(0)"  class=
									"text-decoration-none text-dark item-add addtocart" data-id="<?=$item['id']?>" 
									data-name="<?=$item['name']?>"
									data-photo="<?=$item['photo']?>"
									data-price="<?=$item['price']?>"
									data-discount="<?=$item['discount']?>">
									<i class="fas fa-cart-plus fa-lg py-3 item-add"></i>
								</a>	
							</div>		
						</div>
					</div>

					<div class="card-body text-justify item-card-body">
						<p class="text-muted py-1 my-0"><b>CODENO: </b><?=$item['codeno']?></p>
						<p class="text-muted py-1 my-0"><b>NAME: </b><?=$item['name']?></p>
						<p class="text-muted py-1 my-0"><b>PRICE:</b>
							<?php if($item['discount']){
								echo $item['discount'];
								?>
								<del><?=$item['price']?></del>
							<?php }else{
								echo $item['price'];
							} ?>
						</p>
					</div>
				</div>
			</div>
			<?php 
		}
		?>
	</div>
</div>
</div>
<div class="container">
	<div class="row justify-content-center mt-3">
		<!-- <input type="button" name="" value="View More" class="btn btn-info btn-lg mb-5"> -->
		<a href="products.php" class="btn btn-outline-secondary btn-lg">View More</a>
	</div>	
</div><br>

<?php
include 'include/footer.php';
?>