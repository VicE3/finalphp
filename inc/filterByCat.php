<?php
$cats = !empty($_GET['cats']) ? $_GET['cats'] : '';


try {
    $db = new PDO('mysql:dbname=vechevarria_challenge;host=localhost', 'r2hstudent', 'SbFaGzNgGIE8kfP');
    // $db = new PDO('mysql:dbname=finalphpProject;host=localhost', 'root', 'root');
    //If there are any errors this line will show you them
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $products = 'SELECT * FROM Products';
    
    if(!empty($_GET['cats'])) { 
        $products = $products . ' WHERE product_cat= :cats ';
    }
    //prepare() preps a statement, in this case it is $products, for execution and returns a statement object
    $prepared = $db->prepare($products);
    
    if(!empty($_GET['cats'])) {
        $prepared->bindParam(':cats', $cats);
    }
   

    $prepared->execute();
    
   foreach($prepared->fetchAll() as $cat) {
       //table instead
       //The Img tag has a link inside it. That link is to productdetail.php + product_id which is being set equal to the product id. This is so that in the details
       //page I can use the id to $_GET['product_id'] all the info associated with that product. 
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

    // if an exception occurs, it will get passed to the catch block and php will execute the code inside the catch block
} catch (Exception $e) {
    echo "Sorry this page is not working, Please try again later.";
    exit;
}
?>