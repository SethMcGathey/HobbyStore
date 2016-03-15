<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 

require_once 'sessionStart.php';
require_once 'databaseClasses/customer_addressClass.php';
require_once 'databaseClasses/customer_paymentClass.php';
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
							echo 'Street 1: <nobr><p name="street1" id="street1" contenteditable>' . $innerRow['street_one'] . '</p>
								  Street 2: <nobr><p name="street2" id="street2" contenteditable>' . $innerRow['street_two'] . '</p>
								  Zipcode: <nobr><p name="zipcode" id="zipcode" contenteditable>' . $innerRow['zipcode'] . '</p>
								  City: <nobr><p name="city" id="city" contenteditable>' . $innerRow['city'] . '</p>
								  State: <nobr><p name="state" id="state" contenteditable>' . $innerRow['state'] . '</p>
								  Country: <nobr><p name="country" id="country" contenteditable>' . $innerRow['country'] . '</p>
								  <br>';
						}
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
						$customer_address = new customer_paymentDataAccess();
						foreach($customer_address->readDataJoinedPayments($_SESSION['customerid'])[1] as $innerRow)
						{
							echo 'Name on Card: <nobr><p name="nameOnCard" id="nameOnCard" contenteditable>' . $innerRow['card_full_name'] . '</p>
								  Card Number: <nobr><p name="cardNumber" id="cardNumber" contenteditable>' . $innerRow['card_number'] . '</p>
								  Security Code: <nobr><p name="securityCode" id="securityCode" contenteditable>' . $innerRow['card_security'] . '</p>
								  Expires: <nobr><p name="expiration" id="expiration" contenteditable>' . $innerRow['expires_month'] . '/' . $innerRow['expires_year'] . '</p>
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