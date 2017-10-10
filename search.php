<?php
$pageTitle = "Search";
include("inc/nav.php");
?>
<h1>Search for a product</h1>
<form action="search.php" method="GET" class="searchpg">
    <div>
        <div>

<label for="searchName">Product Search</label>
<input type="text" name="searchName" id="searchName" class="searchName">
</div>
<input type="submit" value="Submit" class="searchBtn">
</div>
</form>
<?php
try {
$db = new PDO('mysql:dbname=finalphpProject;host=localhost', 'root', 'root');
//If there are any errors this line will show you them
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_GET['searchName'])) {
$products = "SELECT * FROM Products WHERE product_name LIKE :userSearchName OR product_descript LIKE :userSearchDescript OR product_price LIKE :userSearchPrice
";

$prepared = $db->prepare($products);

$theSearch = '%'. strip_tags($_GET['searchName']) . '%';

$prepared->bindParam(':userSearchName', $theSearch);
$prepared->bindParam(':userSearchDescript', $theSearch);
$prepared->bindParam(':userSearchPrice', $theSearch);

$prepared->execute();
foreach($prepared->fetchAll() as $cat) {

echo "
    <div class=productContainer>
        <div class=productImage>
            <a href=\"productdetail.php?product_id={$cat['product_id']}\"><img class=\"pics\" src=\"img/{$cat['product_image']}\" alt=\"{$cat['product_name']}\"></a>
        </div>
        <p class=productName>{$cat['product_name']}</p>
        <p>{$cat['product_descript']}</p>
        <p>\${$cat['product_price']}</p>
        <p>{$cat['product_cat']}</p>
    </div>
";

}
}


} catch (Exception $e) {
echo $e->getMessage();
exit;

}


include("inc/footer.php");
?>
