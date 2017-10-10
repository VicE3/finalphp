<?php
$products = "SELECT * FROM Products WHERE product_name = '{$userSearchName}'";
$prepared = $db->prepare($products);
$prepared->execute();
foreach($prepared->fetchAll() as $cat) {

echo "
<div class=productContainer>
<div class=productImage><a href=\"productdetail.php?product_id={$cat['product_id']}\"><img class=\"pics\" src=\"{$cat['product_image']}\" alt=\"{$cat['product_name']}\"></a></div>
<p>{$cat['product_name']}</p>
<p>{$cat['product_descript']}</p>
<p>\${$cat['product_price']}</p>
<p>{$cat['product_cat']}</p>
</div>
";
?>