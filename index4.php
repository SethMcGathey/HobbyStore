<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 

require_once 'databaseClasses/categoryClass.php';
require_once 'databaseClasses/subcategoryClass.php';
require_once 'databaseClasses/imageClass.php';
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
					echo '<div class="col-lg-6 col-md-6"><a href="singleProductPage.php"><img src="data:image/jpeg;base64,' . base64_encode($row[0]['image']) . '"width="100px" class="homePageImages"/></a></div>
						  <div class="col-lg-6 col-md-6"><a href="singleProductPage.php"><img src="data:image/jpeg;base64,' . base64_encode($row[1]['image']) . '"width="100px" class="homePageImages"/></a></div>
						  <div class="col-lg-4 col-md-6"><a href="singleProductPage.php"><img src="data:image/jpeg;base64,' . base64_encode($row[2]['image']) . '"width="100px" class="smallHomePageImages"/></a></div>
						  <div class="col-lg-4 col-md-6"><a href="singleProductPage.php"><img src="data:image/jpeg;base64,' . base64_encode($row[3]['image']) . '"width="100px" class="smallHomePageImages"/></a></div>
						  <div class="col-lg-4 col-md-6"><a href="singleProductPage.php"><img src="data:image/jpeg;base64,' . base64_encode($row[4]['image']) . '"width="100px" class="smallHomePageImages"/></a></div>';
              									
              ?>
          	</div>
		</div>

		<div class="container-fluid" id="ajax_Output">
		</div>

<?php require_once 'footer.php' ?>

	</body>

</html>