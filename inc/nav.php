<!-- move to own file -->
<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
 
  <title><?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="css/style.css?v=< ?php echo time(); ?>" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
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
      <div class="cart">🛒</div>
      <div id="cartCounter"><?php echo $_SESSION["cartItems"];?></div>
</div>
  
