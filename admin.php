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
			<input type="button" value="address" onclick="makeChanges('address')">
			<input type="button" value="bin" onclick="makeChanges('bin')">
			<input type="button" value="category" onclick="makeChanges('category')">
			<input type="button" value="customer" onclick="makeChanges('customer')">
			<input type="button" value="customer_address" onclick="makeChanges('customer_address')">
			<input type="button" value="customer_payment" onclick="makeChanges('customer_payment')">
			<input type="button" value="image" onclick="makeChanges('image')">
			<input type="button" value="payment" onclick="makeChanges('payment')">
			<input type="button" value="product" onclick="makeChanges('product')">
			<input type="button" value="product_bin" onclick="makeChanges('product_bin')">
			<input type="button" value="product_tag" onclick="makeChanges('product_tag')">
			<input type="button" value="shipment_center" onclick="makeChanges('shipment_center')">
			<input type="button" value="subcategory" onclick="makeChanges('subcategory')">
			<input type="button" value="tag" onclick="makeChanges('tag')">
			<input type="button" value="transaction" onclick="makeChanges('transaction')">
			<input type="button" value="transaction_address" onclick="makeChanges('transaction_address')">
			<input type="button" value="transaction_product" onclick="makeChanges('transaction_product')">

	          
		</div>

		<div class="container-fluid" id="ajax_Output">
		</div>

<?php require_once 'footer.php' ?>

	</body>

</html>