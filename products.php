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
		<div class="container-fluid" id="Not_Ajax_Output">
			<h1>Products</h1>

			<?php
				$pdo->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES, true);
				if(isset($_POST['id']))
				{
					$sql = 'SELECT a.id,a.name,a.cost,a.description,b.image FROM product a LEFT JOIN image b ON a.id = b.product_id WHERE a.subcategory_id = ' . $_POST["id"] . ' ORDER BY id';
					//$sql = 'SELECT id,name,cost,description FROM product WHERE subcategory_id = ' . $_POST["id"] . ' ORDER BY id LIMIT 5';
					foreach ($pdo->query($sql) as $row) {
					    echo '<div class="col-4-lg subcategoryColor' . $num . ' product" id="' . $row['a.id']. '">' . '<a href="singleProductPage.php?id='.$row['a.id'].'"><img class="productsImage" src="data:image/jpeg;base64,' . base64_encode($row['b.image']) . '"width="100px"/></a> <p>' . $row['a.name'] . '</p> <p>' . $row['a.description'] . '</p> <p>$' . $row['a.cost'] . '.00</p> <a href="addToCart.php?id=' . $row['a.id'] . '">Add to Cart</a></div>';
					
						/*echo '<div class="row product" id="' . $row['a.id'] . '"> 
				    			 <div class="col-lg-3 cartLine' . $num . '"><img src="data:image/jpeg;base64,' . base64_encode($row['b.image']) . '"width="100px"/> </div>
				    		  	 <div class="col-lg-3 cartLine' . $num . '">' . $row['a.name'] . '<br> ' . $row['a.description'] . '</div> 
				    		  	 <div class="col-lg-3 cartLine' . $num . '">$' . $row['a.cost'] . '</div> 
				    		  	 <div class="col-lg-3 cartLine' . $num . '">';
*/
					}
				}else
				{
					$sql = 'SELECT a.id,a.name,a.cost,a.description,b.image FROM product a LEFT JOIN image b ON a.id = b.product_id ORDER BY a.id';
					$num = 0;
					foreach ($pdo->query($sql) as $row) {
					    echo '<div class="col-4-lg subcategoryColor' . $num . ' product" id="' . $row['a.id'] . '">' . '<a href="singleProductPage.php?id='.$row['a.id'].'"><img class="productsImage" src="data:image/jpeg;base64,' . base64_encode($row['b.image']) . '"width="100px"/></a> <p>' . $row['a.name'] . '</p> <p>' . $row['a.description'] . '</p> <p>$' . $row['a.cost'] . '.00</p> <a href="addToCart.php?id=' . $row['a.id'] . '">Add to Cart</a></div>';

					    /*echo '<div class="row product" id="' . $row['a.id'] . '"> 
				    			 <div class="col-lg-3 cartLine' . $num . '"><img src="data:image/jpeg;base64,' . base64_encode($row['b.image']) . '"width="100px"/> </div>
				    		  	 <div class="col-lg-3 cartLine' . $num . '">' . $row['a.name'] . '<br> ' . $row['a.description'] . '</div> 
				    		  	 <div class="col-lg-3 cartLine' . $num . '">$' . $row['a.cost'] . '</div> 
				    		  	 <div class="col-lg-3 cartLine' . $num . '">';
*/
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
		<div class="container-fluid" id="ajax_Output">

		</div>
	</body>

	<?php require_once 'footer.php' ?>
</html>



<!--
Strategy Games
Family Games
Abstract Games
Classic Games
Baby Toys -> CLassic Toys
Sports -> Superhero
Princess -> Grown Up
Cowboy -> All Ages



clue 2
aggravation 3
go 4
backgammon 5
the duke
good housekeeping
ransburger puzzle
time square puzzle
african
world
magic 8
super
captain
-->