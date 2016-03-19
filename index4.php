<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 

require_once 'databaseClasses/categoryClass.php';
require_once 'databaseClasses/subcategoryClass.php';
?>
<!DOCTYPE html>
<html lang="en">
	<?php require_once 'header.php' ?>

	<body>

		<?php require_once 'navigation.php' ?> 
		<div class="container-fluid" id="Not_Ajax_Output">
			<h1 class="centerText">Clash Games</h1>
			<div class="row">
	          <?php
	          	$image = new imageDataAccess();
	          	$row = $image->readData()[1];
					echo '<div class="col-lg-6"><img src="data:image/jpeg;base64,' . base64_encode($row[1]['image']) . ' class="homePageImages"/></div>
						  <div class="col-lg-6"><img src="data:image/jpeg;base64,' . base64_encode($row[2]['image']) . ' class="homePageImages"/></div>
						  <div class="col-lg-4"><img src="data:image/jpeg;base64,' . base64_encode($row[3]['image']) . ' class="homePageImages"/></div>
						  <div class="col-lg-4"><img src="data:image/jpeg;base64,' . base64_encode($row[4]['image']) . ' class="homePageImages"/></div>
						  <div class="col-lg-4"><img src="data:image/jpeg;base64,' . base64_encode($row[5]['image']) . ' class="homePageImages"/></div>';
              ?>
          	</div>

			<div id="inner_ajax_Output">
				<?php
		          	$subcategory = new subcategoryDataAccess();
				 
				  	$num = 0;
					foreach($subcategory->readData(1)[1] as $innerRow)
					{
						echo '<a class=categoryId' . $innerRow['category_id'] . ' href="products.php?id=' . $innerRow['id']. '"><div class="col-lg-12 subcategoryColor' . $num . ' id="' . $innerRow['id']. '"><p class="leftRight' . $num . '"">' . $innerRow['name'] . '</p></div></a>';
		                if($num < 1)
		               	{
		                	$num++;
		                }else
		                {
							$num = 0;
		                }
					}
				?>
			</div>
		</div>

		<div class="container-fluid" id="ajax_Output">
		</div>

<?php require_once 'footer.php' ?>

	</body>

</html>