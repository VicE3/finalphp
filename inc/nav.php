<?php include("../productdeail.php") ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
 
  <title><?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="css/style.css?v=< ?php echo time(); ?>" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
  <link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
  <script src="js/jquery.validate.js"></script>
</head>
<body>

<div class="fotorama">
  <img src="img/libary.jpeg">
  <img src="img/slider_2.jpeg">
</div>

<div class="navbar">
  <nav>
    <ul class="navContainer">
      <li class="home"><a href="index.php">Home</a></li>
      <li class="products"><a href="products.php">Products</a></li>
      <li class="search"><a href="search.php">Search</a></li>
      <li class="contact"><a href="contact.php">Contact</a></li>
      <li class="cart"><div class="cartContainer">🛒</div></li>
      <div id="cartCounter"></div>
    </ul>
  </nav>
</div>
  
