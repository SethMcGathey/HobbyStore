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
			<h1 class="centerText">Admin Page</h1>
			<input type="button" text="address">
			bin
			category
			customer
			customer_address
			customer_payment
			image
			payment
			product
			product_bin
			product_tag
			shipment_center
			subcategory
			tag
			transaction
			transaction_address
			transaction_product

	          
		</div>

		<div class="container-fluid" id="ajax_Output">
		</div>

<?php require_once 'footer.php' ?>

	</body>

</html>