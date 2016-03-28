<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sessionStart.php';
require_once 'accessDatabaseClass.php'; 
require_once 'databaseClasses/productClass.php';
 ?>
<!DOCTYPE html>
<html lang="en">
	<?php require_once 'header.php' ?>
	<body>
		<?php require_once 'navigation.php' ?>
		<div class="container-fluid wrapper" id="Not_Ajax_Output">
			<h1>Products</h1>

			<?php
				$pdo->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES, true);
				if(isset($_GET['id']))
				{
					$sql = 'SELECT a.id,a.name,a.cost,a.description,b.image,b.description FROM product a LEFT JOIN image b ON a.id = b.product_id WHERE a.subcategory_id = ' . $_GET["id"];
					$num = 0;
					foreach ($pdo->query($sql) as $row) {
					    echo '<div class="col-4-lg subcategoryColor' . $num . ' product" id="' . $row['a.id']. '">' . '<a href="singleProductPage.php?id='.$row['a.id'].'"><img class="productsImage" alt="' . $row['b.description'] . '" title="' . $row['b.description'] . '"  src="data:image/jpeg;base64,' . base64_encode($row['b.image']) . '"width="100px"/></a> <p>' . $row['a.name'] . '</p> <p>' . $row['a.description'] . '</p> <p>$' . $row['a.cost'] . '.00</p> <a href="addToCart.php?id=' . $row['a.id'] . '">Add to Cart</a></div>';
					
						if($num < 1){
				    		$num++;
				    	}else
				    	{
				    		$num = 0;
				    	}
					}
				}else
				{
					$sql = 'SELECT a.id,a.name,a.cost,a.description,b.image,b.description FROM product a LEFT JOIN image b ON a.id = b.product_id ORDER BY a.id';
					$num = 0;
					foreach ($pdo->query($sql) as $row) {
					    echo '<div class="col-4-lg subcategoryColor' . $num . ' product" id="' . $row['a.id'] . '">' . '<a href="singleProductPage.php?id='.$row['a.id'].'"><img class="productsImage" alt="' . $row['b.description'] . '" title="' . $row['b.description'] . '" src="data:image/jpeg;base64,' . base64_encode($row['b.image']) . '"width="100px"/></a> <p>' . $row['a.name'] . '</p> <p>' . $row['a.description'] . '</p> <p>$' . $row['a.cost'] . '.00</p> <a href="addToCart.php?id=' . $row['a.id'] . '">Add to Cart</a></div>';

				    	if($num < 1){
				    		$num++;
				    	}else
				    	{
				    		$num = 0;
				    	}
					}
				}
			?>


		</div>
		<div class="container-fluid wrapper" id="ajax_Output">

		</div>
	</body>

	<?php require_once 'footer.php' ?>
</html>
