<?php

require "classes/Product.php";
if (isset($_POST['submit'])) {
$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$productType = $_POST['productType'];
$size = $_POST['size'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$width = $_POST['width'];
$length = $_POST['length'];

$product = new Product($sku, $name, $price, $productType, $size, $weight, $height, $width, $length);
$saved = $product->save();

if($saved['success']){
    header("Location: index.php");
}else{
    echo $saved['message'];
}
}
else{
    echo "Go through proper route";
}
?>