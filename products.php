<?php 
include 'include/header.php';
include 'backend/dbconnect.php';

$sql="SELECT items.*,brands.name as brand_name,subcategories.name as 
sub_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id";


$stmt=$pdo->prepare($sql);
$stmt->execute();
$items=$stmt->fetchAll();
?>

<!-- New Arrivals -->
<div id="products">
	<div class="container-fluid">
		<div class="row justify-content-center mt-5">
			<div class="col-7 text-center">
				<h5 class="text-uppercase">New Arrivals</h5>	
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
		<ul class="pagination">
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
					<span class="sr-only">Previous</span>
				</a>
			</li>
			<li class="page-item"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item"><a class="page-link" href="#">4</a></li>
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
					<span class="sr-only">Next</span>
				</a>
			</li>
		</ul>
	</div>
</div>
<?php
include 'include/footer.php';
?>