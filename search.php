<?php
$pageTitle = "Search";
include("inc/nav.php");

$priceFilter = !empty($_GET['priceFilter']) ? $_GET['priceFilter'] : '';
$searchName = !empty($_GET['searchName']) ? $_GET['searchName'] : '';
?>
<h1>Search for a product</h1>
<form action="search.php" method="GET" class="searchForm">
    <label for="searchName" class="searchLabel">Product Search</label>
        <input type="text" name="searchName" id="searchName" class="searchName">
<div class="priceFilter">
    <label for="priceFilter">Price Filter</label>
        <select id="priceFilter" name="priceFilter">
            <option></option>
            <option value="05-20">$5-$20</option>
            <option value="21-45">$21-$45</option>
        </select>
</div>
    <input type="submit" value="Submit" class="searchBtn">
</form>
<?php
try {
$db = new PDO('mysql:dbname=vechevarria_challenge;host=localhost', 'r2hstudent', 'SbFaGzNgGIE8kfP');
//If there are any errors this line will show you them
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_GET['searchName'])) {
$products = "SELECT * FROM Products WHERE (product_name LIKE :userSearchName OR product_descript LIKE :userSearchDescript OR product_price LIKE :userSearchPrice) AND product_price <= :maxPrice AND product_price >= :minPrice ORDER BY product_price
";

//split the option at the dash, use strpos to find the first time we see "dash"
//start at $_GET[priceFilter], keep going till you find the dash
$splitOption = strpos($priceFilter, "-");

//substr finds part of a string, you tell it where to start and how far to go
$splitMin = substr($priceFilter, 0, 2);

$splitMax = substr($priceFilter, $splitOption + 1, 2);

$prepared = $db->prepare($products);

$theSearch = '%'. strip_tags($searchName) . '%';

$prepared->bindParam(':userSearchName', $theSearch);
$prepared->bindParam(':userSearchDescript', $theSearch);
$prepared->bindParam(':userSearchPrice', $theSearch);
$prepared->bindParam(':maxPrice', strip_tags($splitMax));
$prepared->bindParam(':minPrice', strip_tags($splitMin));


$prepared->execute();
foreach($prepared->fetchAll() as $cat) {

echo "
    <div class=productSearchContainer>
        <div class=productSearchImage>
            <a href=\"productdetail.php?product_id={$cat['product_id']}\">
                <img class=\"pics\" src=\"img/{$cat['product_image']}\" alt=\"{$cat['product_name']}\">
            </a>
        </div>
        <p class=productSearchName>{$cat['product_name']}</p>
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
