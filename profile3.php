<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 

require_once 'sessionStart.php';
require_once 'databaseClasses/customerClass.php';
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
				<div class="col-lg-6">
					<h3>General Information</h3>
					<form action="changeAddress.php" method="POST">
						<p>First Name:</p><input type="text" placeholder="First Name" name="firstName" id="firstName">
						<p>Last Name:</p><input type="text" placeholder="Last Name" name="lastName" id="lastName">
						<p>Phone Number:</p><input type="text" placeholder="Phone Number" name="phoneNumber" id="phoneNumber">
						<p>Date Of Birth:</p><input type="text" placeholder="Date of Birth" name="dob" id="dob">
						<p>Username:</p><input type="text" placeholder="Username" name="username" id="username">
						<p>Password:</p><input type="text" placeholder="Password" name="password" id="password">
						<p>Gender:</p><input type="text" placeholder="Gender" name="gender" id="gender">
						<p>Email:</p><input type="text" placeholder="Email" name="email" id="email">
						<button>Add Address</button>
						<br>
					</form>
				</div>
				<div class="col-lg-6">
					<h3>Current General Information</h3>
					<div class="scrollbox">
						<?php
							$customer = new customerDataAccess();
							foreach($customer->readDataByUserID($_SESSION['customerid'])[1] as $innerRow)
							{
								echo 'First Name: <p name="firstName" id="firstName" contenteditable>' . $innerRow['first_name'] . '</p>
									  Last Name: <p name="lastName" id="lastName" contenteditable>' . $innerRow['last_name'] . '</p>
									  Phone Number: <p name="phoneNumber" id="phoneNumber">' . $innerRow['phone'] . '</p>
									  Date Of Birth: <p name="dob" id="dob" contenteditable>' . $innerRow['dob'] . '</p>
									  Username: <p name="username" id="username" contenteditable>' . $innerRow['username'] . '</p>
									  Password: <p name="password" id="password" contenteditable>' . $innerRow['password'] . '</p>
									  Gender: <p name="gender" id="gender" contenteditable>' . $innerRow['gender'] . '</p>
									  Email: <p name="email" id="email" contenteditable>' . $innerRow['email'] . '</p>
									  <br>';
							}
			            ?>
			            
		        	</div>
		        	<input id="updateGeneralInformation">Update</input>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
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
				<div class="col-lg-6">
					<h3>Current Addresses</h3>
					<div class="scrollbox">
						<?php
							$customer_address = new customer_addressDataAccess();
							foreach($customer_address->readDataJoinedAddress($_SESSION['customerid'])[1] as $innerRow)
							{
								echo 'Street 1: <p name="street1" id="street1" contenteditable>' . $innerRow['street_one'] . '</p>
									  Street 2: <p name="street2" id="street2" contenteditable>' . $innerRow['street_two'] . '</p>
									  Zipcode: <p name="zipcode" id="zipcode" contenteditable>' . $innerRow['zipcode'] . '</p>
									  City: <p name="city" id="city" contenteditable>' . $innerRow['city'] . '</p>
									  State: <p name="state" id="state" contenteditable>' . $innerRow['state'] . '</p>
									  Country: <p name="country" id="country" contenteditable>' . $innerRow['country'] . '</p>
									  <br>';
							}
			            ?>
			            
		        	</div>
		        	<input id="updateAddress">Update</input>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<h3>New Card</h3>
					<form action="changePayment.php" method="POST">
						<p>Name on Card:</p><input type="text" placeholder="Name on Card" name="nameOnCard" id="nameOnCard">
						<p>Card Type:</p><input type="text" placeholder="Card Type" name="cardType" id="cardType">
						<p>Card Number:</p><input type="text" placeholder="Card Number" name="cardNumber" id="cardNumber">
						<p>Security Code:</p><input type="text" placeholder="Security Code" name="securityCode" id="securityCode">
						<p>Expiration:</p><input type="text" placeholder="Expiration" name="expiration" id="expiration">
						<button>Add Card</button>
					</form>
				</div>
				<div class="col-lg-6">
					<h3>Cards on Record</h3>
					
						<?php
							echo '<div class="scrollbox">';
							$customer_payment = new customer_paymentDataAccess();
							foreach($customer_payment->readDataJoinedPayments($_SESSION['customerid'])[1] as $innerRow)
							{
								echo 'Name on Card: <p name="nameOnCard" id="nameOnCard' . $innerRow['id'] . '" contenteditable>' . $innerRow['card_full_name'] . '</p>
									  Card Type: <p name="cardType" id="cardType' . $innerRow['id'] . '" contenteditable>' . $innerRow['payment_type'] . '</p>
									  Card Number: <p name="cardNumber" id="cardNumber' . $innerRow['id'] . '" contenteditable>' . $innerRow['card_number'] . '</p>
									  Security Code: <p name="securityCode" id="securityCode' . $innerRow['id'] . '" contenteditable>' . $innerRow['card_security'] . '</p>
									  Expires: <p name="expiration" id="expiration' . $innerRow['id'] . '" contenteditable>' . $innerRow['expires_month'] . '/' . $innerRow['expires_year'] . '</p>
									  <br>';
									  echo '<input type="submit" text="Update" id="updatePayment">';
			                }
			                echo '</div>';
			            ?>
		        	
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