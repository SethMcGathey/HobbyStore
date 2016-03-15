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
		<div class="container" id="Not_Ajax_Output">
			<div class="row">
				<div class="col-lg-3">
					<h3>Address</h3>
					<form action="changeAddress.php" method="POST">
						<p>Street 1:</p><input type="text" placeholder="Street 1" name="street1" id="street1">
						<p>Street 2:</p><input type="text" placeholder="Street 2" name="street2" id="street2">
						<p>Zipcode:</p><input type="text" placeholder="Zipcode" name="zipcode" id="zipcode">
						<p>City:</p><input type="text" placeholder="City" name="city" id="city">
						<p>State:</p><input type="text" placeholder="State" name="state" id="state">
						<p>Country:</p><input type="text" placeholder="Country" name="country" id="country">
						<button>Add Address</button>
						<br>
					</form>
				</div>
				<div class="col-lg-3">
					<h3>Current Addresses</h3>
					<div class="scrollbox">
					<?php
						$customer_address = new customer_addressDataAccess();
						foreach($customer_address->readDataJoinedAddress($_SESSION['customerid'])[1] as $innerRow)
						{
							echo '<p name="street1" id="street1">Street 1: ' . $row['street_one'] . '</p>
								  <p name="street2" id="street2">Street 2: ' . $row['street_two'] . '</p>
								  <p name="zipcode" id="zipcode">Zipcode: ' . $row['zipcode'] . '</p>
								  <p name="city" id="city">City: ' . $row['city'] . '</p>
								  <p name="state" id="state">State: ' . $row['state'] . '</p>
								  <p name="country" id="country">Country: ' . $row['country'] . '</p>
								  <br>';
						}
						//echo $_SESSION['customerid'];
		            ?>
		        	</div>
				</div>
				<div class="col-lg-3">
					<h3>New Card</h3>
					<form action="changePayment.php" method="POST">
						<p>Name on Card:</p><input type="text" placeholder="Name on Card" name="nameOnCard" id="nameOnCard">
						<p>Card Number:</p><input type="text" placeholder="Card Number" name="cardNumber" id="cardNumber">
						<p>Security Code:</p><input type="text" placeholder="Security Code" name="securityCode" id="securityCode">
						<p>Expiration:</p><input type="text" placeholder="Expiration" name="expiration" id="expiration">
						<button>Add Card</button>
					</form>
				</div>
				<div class="col-lg-3">
					<h3>Cards on Record</h3>
					<div class="scrollbox">
					<?php
						$customer_address = new customer_addressDataAccess();
						foreach($customer_address->readDataJoinedPayments($_SESSION['customerid'])[1] as $innerRow)
						{
							echo '<p name="nameOnCard" id="nameOnCard">Name on Card: ' . $row['card_full_name'] . '</p>
								  <p name="cardNumber" id="cardNumber">Card Number: ' . $row['card_number'] . '</p>
								  <p name="securityCode" id="securityCode">Security Code: ' . $row['card_security'] . '</p>
								  <p name="expiration" id="expiration">Expires: ' . $row['expires_month'] . '/' . $row['expires_year'] . '</p>
								  <br>';
		                }
		            ?>
		        	</div>
				</div>
			</div>
			<div id="inner_ajax_Output">
			</div>
		</div>

		<div class="container-fluid" id="ajax_Output">
		</div>
	</body>

	<?php require_once 'footer.php' ?>
</html>