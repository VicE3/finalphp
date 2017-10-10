<?php
$pageTitle = "Search";
include("inc/nav.php");
?>
<h1>Search for a product</h1>
<form action="search.php" method="GET" class="searchpg">
    <div>
        <div>
<label for="search"></label>

<label for="searchName">Product Search</label>
<input type="text" name="searchName" for="searchName" class="searchName">

<div>
<select name="cats" class="cats">
    <option value="null"></option>
    <option value="Pens">Pens</option>
    <option value="Gel Pens">Gel Pens</option>
    <option value="Paper">Papers</option>
    <option value="Journal">Journals</option>
  </select>
</div>
</div>
<input type="submit" value="Submit" class="searchBtn">
</div>
</form>
<?php 
include("inc/filterByCat.php");
try {
$db = new PDO('mysql:dbname=finalphpProject;host=localhost', 'root', 'root');
//If there are any errors this line will show you them
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$userSearchName = $_GET['searchName'];

if(isset($_GET['searchName'])) {
$products = "SELECT * FROM Products WHERE product_name LIKE '%{:userSearchName}%' OR product_descript LIKE '%{:userSearchDescript}%' OR product_price LIKE '%{:userSearchPrice}%' 
";

$prepared = $db->prepare($products);

$prepared->bindParam(':userSearchName', strip_tags($_GET['searchName']));
$prepared->bindParam(':userSearchDescript', strip_tags($_GET['searchName']));
$prepared->bindParam(':userSearchPrice', strip_tags($_GET['searchName']));

$prepared->execute();
foreach($prepared->fetchAll() as $cat) {

echo "
<div class=productContainer>
<div class=productImage>
    

<a href=\"productdetail.php?product_id={$cat['product_id']}\">

<img class=\"pics\" src=\"img/{$cat['product_image']}\" alt=\"{$cat['product_name']}\">

</a>


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


?>
