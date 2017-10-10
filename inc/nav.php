<!-- move to own file -->
<?php 
session_start();
?>
<!DOCTYPE html>
<html>
 <head>
<!-- 1. Link to jQuery (1.8 or later), -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- 33 KB -->

<!-- fotorama.css & fotorama.js. -->
<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="css/style.css?v=< ?php echo time(); ?>" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
  <script src="js/final.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
<title><?php echo $pageTitle; ?></title>
</head>
<body>

<div class="navbar">
  <nav>
    <ul class="navContainer">
      <li class="home"><a href="index.php">Home</a></li>
      <li class="products"><a href="products.php">Products</a></li>
      <li class="search"><a href="search.php">Search</a></li>
      <li class="contact"><a href="contact.php">Contact</a></li>
    </ul>
  </nav>
      <div class="cart">🛒 <?php echo $_SESSION["cartItems"];?></div>
</div>
  
