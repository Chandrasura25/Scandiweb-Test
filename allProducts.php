<?php
session_start();
$products = $_SESSION['products'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./styles/Navbar.css">
	<link rel="stylesheet" href="./styles/ProductList.css">
	<link rel="stylesheet" href="./styles/ProductAdd.css">
</head>
<body>
<div class="container">
		<nav class="app__navbar">
			<div class="app__navbar-logo">
				<p>Product List</p>
			</div>
			<ul class="app__navbar-links">
				<li class="app__flex p-text">
					<div></div>
					<button onclick="navigateToAddProduct()" type="button">ADD</button>
				</li>
				<li class="app__flex p-text">
					<div></div>
					<button onclick="deleteSelectedProducts()" id="mass-delete-btn" type="submit">MASS DELETE</button>
				</li>
			</ul>
			<div class="app__navbar-menu">
				<button onclick="toggleMenu()">MENU</button>
				<ul class="app__navbar-links" id="menu">
					<li class="app__flex p-text">
						<div></div>
						<button onclick="navigateToAddProduct()" type="button">ADD</button>
					</li>
					<li class="app__flex p-text">
						<div></div>
						<button onclick="deleteSelectedProducts()" id="mass-delete-btn" type="submit">MASS DELETE</button>
					</li>
				</ul>
			</div>
		</nav>
		<div class="list__container">
		  <form id="product-list-form" method="post" action="deleteProduct.php">
			<div class="list__box">
					<?php
                    foreach ($products as $product) {
                        $sku = $product['sku'];
                        $name = $product['name'];
                        $price = $product['price'];
                        $productType = $product['productType'];
                    
                        if ($productType === 'Furniture') {
                            $dimension = $product['height'] . 'x' . $product['width'] . 'x' . $product['length'];
                            $description = "Dimension: $dimension";
                        } else if ($productType === 'DVD') {
                            $size = $product['size'];
                            $description = "Size: $size MB";
                        } else {
                            $weight = $product['weight'];
                            $description = "Weight: $weight KG";
                        }
                    
                        echo "<div class='card'>";
                        echo "<input type='checkbox' class='delete-checkbox' name='sku[]' value='$sku'>";
                        echo "<ul>";
                        echo "<li>$sku</li>";
                        echo "<li>$name</li>";
                        echo "<li>$price.00 $</li>";
                        echo "<li>$description</li>";
                        echo "</ul>";
                        echo "</div>";
                    }
                    ?>
			</div>
		 </form>
	    </div>
	</div>
</body>

<script>
		function navigateToAddProduct() {
			window.location.href = './create.html';
		}
        function toggleMenu() {
		  const menu = document.getElementById('menu');
		  menu.classList.toggle('show');
	    }

        function deleteSelectedProducts() {
	        const checkboxes = document.querySelectorAll('.delete-checkbox');
	        const selectedProductIndexes = [];

	        checkboxes.forEach((checkbox) => {
	        	if (checkbox.checked) {
	        		selectedProductIndexes.push(checkbox.value);
	        	}
	        });

	        if (selectedProductIndexes.length > 0) {
	        	const form = document.getElementById('product-list-form');
	        	form.submit();
	        } else {
	        	alert('Please select at least one product to delete.');
	        }
       }
	</script>
</html>