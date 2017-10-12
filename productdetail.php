<?php
$numOfItems = !empty($_GET['numOfItems']) ? $_GET['numOfItems'] : '';
$product_id = !empty($_GET['product_id']) ? $_GET['product_id'] : '';

session_start();
$_SESSION["cartItems"] = $_SESSION["cartItems"] +  $numOfItems;
$pageTitle = "Product Details";
include("inc/nav.php");
?>

<div class="productsDetailContainer">

<?php
  try {
   
    //creating a new pdo connection
    $db = new PDO('mysql:dbname=vechevarria_challenge;host=localhost', 'r2hstudent', 'SbFaGzNgGIE8kfP');
    //WHERE-- :product_id is a placeholder, eventually we bind it with $_GET[product_id]
    $productDetail = 'SELECT * FROM Products WHERE product_id= :product_id';

    $prepared = $db->prepare($productDetail);

    $prepared->bindParam(':product_id', $product_id);

    $prepared->execute();

    //This returns an arrya of the product
    // var_dump($prepared->fetchAll());


    //For each result of query ($productDetail), create this table row
    foreach($prepared->fetchAll() as $detail) {
        echo "
        <div class=productContainer id=productDetailContainer>
            <h1 class=productTitle>{$detail['product_name']}</h1>
                <div class=productDetailImage>
                    <a href=\"productdetail.php?product_id={$detail['product_id']}\">
                        <img class=\"pics\" src=\"img/{$detail['product_image']}\" alt=\"{$detail['product_name']}\">
                    </a>
                </div>
                <p>{$detail['product_descript']}</p>
                <p>{$detail['product_discript_full']}</p>
                <p>\${$detail['product_price']}</p>
        </div>
        ";
    }

// if an exception occurs, it will get passed to the catch block and php will execute the code inside the catch block
} catch (Exception $e) {
    echo "Sorry this page is not working, Please try again later.";
    exit;
}
?>
</div>
<div>
    <form onSubmit="added()" name="addToCart" method="GET" action="productdetail.php" class="addToCart">
        <input type="hidden" name="product_id" value="<?php echo $_GET['product_id']?>">
        <input type="number" id="numOfItems" name="numOfItems" class="number">
        <input type="submit" value="Add to cart" class="addToCartSubmitBtn">
    </form>
</div>
<?php include("inc/footer.php"); ?>