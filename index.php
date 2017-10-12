<?php
$pageTitle ="Home";
include("inc/nav.php");
?>
<div class="fotorama">
    <img src="img/office.jpg" alt="office">
    <img src="img/pencils.jpeg" alt="pencils">
    <img src="img/laptop.jpeg" alt="laptop">
</div>
<h1>Featured Items</h1>
    <div class="indexContainer">
<?php

  try {
    $db = new PDO('mysql:dbname=vechevarria_challenge;host=localhost', 'r2hstudent', 'SbFaGzNgGIE8kfP');
    //If there are any errors this line will show you them
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $products = 'SELECT product_image, product_name, product_descript, product_price, product_cat, product_id FROM Products WHERE is_featured= "FT"';
    
    //prepare() preps a statement, in this case it is $products, for execution and returns a statement object
    $prepared = $db->prepare($products);
   
    $prepared->execute();
    
   foreach($prepared->fetchAll() as $cat) {
       //table instead
       //The Img tag has a link inside it. That link is to productdetail.php + product_id which is being set equal to the product id. This is so that in the details
       //page I can use the id to $_GET['product_id'] all the info associated with that product. 
    echo "
    <div class=featuredContainer>
        <div class=featuredImage>
            <a href=\"productdetail.php?product_id={$cat['product_id']}\">
                <img class=\"pics\" src=\"img/{$cat['product_image']}\" alt=\"{$cat['product_name']}\">
            </a>
        </div>
        <p class=featuredName>{$cat['product_name']}</p>
        <p>{$cat['product_descript']}</p>
        <p>\${$cat['product_price']}</p>
        <p>{$cat['product_cat']}</p>
    </div>
    ";
    }

    // if an exception occurs, it will get passed to the catch block and php will execute the code inside the catch block
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
?>
</div>
<?php include("inc/footer.php"); ?>