<?php
$pageTitle = "Product Details";
include("inc/nav.php");
session_start();
?>

<div class="productsDetailContainer">

<?php
  try {
    $_SESSION["cartItems"] =  $_GET['numOfItems'];
    $num = $_SESSION["cartItems"];
    echo $num;
    //creating a new pdo connection
    $db = new PDO('mysql:dbname=finalphpProject;host=localhost', 'root', 'root');
    //WHERE-- :product_id is a placeholder, eventually we bind it with $_GET[product_id]
    $productDetail = 'SELECT * FROM Products WHERE product_id= :product_id';

    $prepared = $db->prepare($productDetail);

    $prepared->bindParam(':product_id', $_GET['product_id']);

    $prepared->execute();

    //This returns an arrya of the product
    // var_dump($prepared->fetchAll());


    //For each result of query ($productDetail), create this table row
    foreach($prepared->fetchAll() as $detail) {
        echo "
        <div class=productDetailContainer>
        <h1 class=productTitle>{$detail['product_name']}</h1>
        <div class=productDetailImage><a href=\"productdetail.php?product_id={$detail['product_id']}\"><img class=\"pics\" src=\"img/{$detail['product_image']}\" alt=\"{$detail['product_name']}\"></a></div>
        <p class=productName>{$detail['product_name']}</p>
        <p>{$detail['product_descript']}</p>
        <p>{$detail['product_discript_full']}</p>
        <p>\${$detail['product_price']}</p>
        <p>{$detail['product_cat']}</p>
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
<div>
<form onSubmit="added()" name="addToCart" method="GET" action="productdetail.php">
    <input type="number" id="numOfItems" name="numOfItems">
    <input type="submit" value="Add to cart">
</form>
</div>
<?php include("inc/footer.php"); ?>