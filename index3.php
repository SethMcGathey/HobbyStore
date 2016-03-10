<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 

require_once 'sessionStart.php';
require_once 'databaseClasses/categoryClass.php';
require_once 'databaseClasses/subcategoryClass.php';
?>
<!DOCTYPE html>
<html lang="en">
	<?php require_once 'header.php' ?>

	<body>

		<?php require_once 'navigation.php' ?> 
		<div class="container-fluid" id="Not_Ajax_Output">
			<h1 class="centerText">Home Page</h1>
			<div class="row">

	          <?php
	          $category = new categoryDataAccess();
			  $category->readData(1);
			  $num = 0;
			  //print_r($category->readData(1));
			  //foreach ($category->readData(1) as $row) {
				foreach($category->readData(1)[1] as $innerRow)
				{
					echo $name = $innerRow['name'];
					echo '<a href="#">
	                		<div class="col-lg-4 myCategories categoryBackgroundColor' . $num . '" id="' . $innerRow['id']. '">
	                			<img src="img/rrwggame.jpg" width="100px" class="categoryImage"/><p class="centerText">' . $innerRow['name'] . '</p>
	                		</div>
	                	  </a>';
	                if($num < 1)
	               	{
	                	$num++;
	                }else
	                {
						$num = 0;
	                }
				}


               //$sql = 'SELECT id,name FROM category ORDER BY id';
               /*$num = 0;
               foreach ($pdo->query($sql) as $row) {
	                echo '<a href="#">
	                		<div class="col-lg-4 myCategories categoryBackgroundColor' . $num . '" id="' . $row['id']. '">
	                			<img src="img/rrwggame.jpg" width="100px" class="categoryImage"/><p class="centerText">' . $row['name'] . '</p>
	                		</div>
	                	  </a>';
	               	if($num < 1)
	               	{
	                	$num++;
	                }else
	                {
						$num = 0;
	                }
               }*/


              ?>
          	</div>

			<div id="inner_ajax_Output">
				<?php
		          $category = new categoryDataAccess();
				  $category->readData(1);
				  $num = 0;
				  //print_r($category->readData(1));
				  //foreach ($category->readData(1) as $row) {
					foreach($category->readData(1)[1] as $innerRow)
					{
						echo $name = $innerRow['name'];
						echo '<a href="#">
		                		<div class="col-lg-4 myCategories categoryBackgroundColor' . $num . '" id="' . $innerRow['id']. '">
		                			<img src="img/rrwggame.jpg" width="100px" class="categoryImage"/><p class="centerText">' . $innerRow['name'] . '</p>
		                		</div>
		                	  </a>';
		                if($num < 1)
		               	{
		                	$num++;
		                }else
		                {
							$num = 0;
		                }
					}


				    /*$sql = 'SELECT id,name,category_id FROM subcategory WHERE category_id = 1';
				    $num = 0;
					foreach ($pdo->query($sql) as $row) {
						//echo 'hello';
				    	echo '<a href="products.php?id=' . $row['id']. '"><div class="col-lg-12 subcategoryColor' . $num . '" id="' . $row['id']. '"><p class="leftRight' . $num . '"">' . $row['name'] . '</p></div></a>';

				    	if($num < 1){
				    		$num++;
				    	}else
				    	{
				    		$num = 0;
				    	}
					}*/
				?>
			</div>
		</div>

		<div class="container-fluid" id="ajax_Output">
		</div>


<?php require_once 'footer.php' ?>


	</body>

	
</html>





