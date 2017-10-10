<?php
$pageTitle = "Products";
include("inc/nav.php");
?>

<h1>Filter by Category</h1>
<form action="products.php" method="GET">
  <select name="cats" class="cats">
  <option value="">ALL</option>
    <option value="Pens">Pens</option>
    <option value="Gel Pens">Gel Pens</option>
    <option value="Paper">Papers</option>
    <option value="Journal">Journals</option>
  </select>
  <input type="submit" value="Filter" class="filter"/>
</form>
<div class="productsContainer">
<?php
include("inc/filterByCat.php");
?>
</div>
<?php include("inc/footer.php"); ?>
