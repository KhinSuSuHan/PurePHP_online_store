<?php 

session_start();
include 'backend/dbconnect.php';

$sql="SELECT * FROM subcategories";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$subcategories=$stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>

 <!--  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content=""> -->

  <title>Virgo's Online Store</title>
  <!-- Favicon -->
  <link rel="icon" type="image/gif" href="images/logo/logo.png" sizes="16x16">
  <!-- Bootstrap Css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">

  <!-- Icofont -->
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

</head>
<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <a class="navbar-brand" href="index.html">
        <!-- <img src="images/logo/logo.png" id="logo"> -->
        VIRGO'S ONLINE SHOP
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-3">
            <a class="nav-link" href="home.php">HOME</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link" href="products.php">PRODUCTS</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             CATEGORIES
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 
            foreach ($subcategories as $subcategory) {
              ?>
              <a class="dropdown-item" href="categories.php?id=<?=$subcategory['id']?>"><?=$subcategory['name']?></a>
              <?php  
            }
            ?>
          </div>
        </li>
        <li class="nav-item mx-3"><a class="nav-link" href="about.php">ABOUT</a></li>
        <li class="nav-item mx-3"><a class="nav-link" href="contact.php">CONTACT</a></li>
        <?php 
            if (isset($_SESSION['loginuser'])) {
        ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <?=$_SESSION['loginuser']['name']?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="logout.php">Logout</a>
            
          </div>
        </li>
        <?php 
          }else{
         ?>
        <li class="nav-item mx-3"><a class="nav-link" href="login.php">LOGIN</a></li>
        <li class="nav-item mx-3"><a class="nav-link" href="register.php">REGISTER</a></li>
        <?php 
          }
        ?>

        <li class="nav-item mx-3"><a class="nav-link" href="checkout.php" id="count">
          <span class="p1 fa-stack has-badge" id="item_count">
          <i class="p3 fas fa-shopping-cart fa-stack-1x xfa-inverse"></i>
          </span>
        </a></li>
      </ul>
    </div>
  </nav>
</div>


