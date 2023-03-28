<?php
require "classes/Product.php";
session_start();
$product = new Product("","","","");
$data = $product->getProductData();
$_SESSION['products']=$data['result'];
if ($data['result']) {
    header("Location: allProducts.php");
} else {
    header("Location: allProducts.php");
    echo "No products found";
}
?>