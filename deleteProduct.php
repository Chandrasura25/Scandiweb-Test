<?php

require "classes/Product.php";
if (isset($_POST['sku'])) {
    $skus = $_POST['sku'];
    foreach ($skus as $key => $sku) {
        $product = new Product($sku, '', '', '');
        $deletedProduct = $product->deleteProduct();
        header("Location: index.php");
         if ($deletedProduct['success']) {
            print_r(['success' => true, 'message' => 'Product deleted successfully']);
            header("Location: index.php");
         } else {
            print_r(['success' => false, 'message' => 'Product not deleted']);
         }
    }
} 
else {
    echo json_encode(['success' => false, 'message' => 'Invalid Request']);
}
