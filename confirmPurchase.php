<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 
require_once 'databaseClasses/transactionClass.php';
require_once 'databaseClasses/transaction_productClass.php';
?>
<!DOCTYPE html>
<html lang="en">
	<?php require_once 'header.php' ?>
	<body>
		<?php require_once 'navigation.php' ?>
		<div class="container wrapper" id="Not_Ajax_Output">
			<div class="row">
				<div class="col-lg-6">
					<h3>Chosen Card</h3>
					<div class="scrollbox">
					<?php
		               	$sql = "SELECT card_full_name, card_number, card_security, expires_month, expires_year FROM payment WHERE id = " . $_SESSION['paymentIdForPurchase'];
		               	foreach ($pdo->query($sql) as $row) {
			               	echo '<p name="nameOnCard" id="nameOnCard">Name on Card: ' . $row['card_full_name'] . '</p>
								  <p name="cardNumber" id="cardNumber">Card Number: ' . $row['card_number'] . '</p>
								  <p name="securityCode" id="securityCode">Security Code: ' . $row['card_security'] . '</p>
								  <p name="expiration" id="expiration">Expires: ' . $row['expires_month'] . '/' . $row['expires_year'] . '</p>
								  <br>';
		               }
		            ?>
		        	</div>
				</div>
				<div class="col-lg-6">
					<h3>Chosen Address</h3>
					<div class="scrollbox">
					<?php
		               	$sql = "SELECT street_one, street_two, zipcode, city, state, country FROM address WHERE id = " . $_SESSION['addressIdForPurchase'];
		               	foreach ($pdo->query($sql) as $row) {
			               	echo '<p name="street1" id="street1">Street 1: ' . $row['street_one'] . '</p>
								  <p name="street2" id="street2">Street 2: ' . $row['street_two'] . '</p>
								  <p name="zipcode" id="zipcode">Zipcode: ' . $row['zipcode'] . '</p>
								  <p name="city" id="city">City: ' . $row['city'] . '</p>
								  <p name="state" id="state">State: ' . $row['state'] . '</p>
								  <p name="country" id="country">Country: ' . $row['country'] . '</p>
								  <br>';
		               }
		            ?>
		        	</div>
				</div>
			</div>
			<div class="row">
			<?php
				$num=0;
				$overallTotal = 0;
				$transaction = new transactionDataAccess();
                foreach($transaction->readDataForCart($_SESSION['customerid'])[1] as $row)
				{
					if($row['fullQuantity'] != 0){
						
						echo '<div class="row product" id="' . $row['id'] . '"> 
				    			 <div class="col-lg-3 cartLine' . $num . '"><img alt="' . $row['description'] . '" title="' . $row['description'] . '"  src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"width="100px"/> </div>
				    		  	 <div class="col-lg-3 cartLine' . $num . '">' . $row['name'] . '<br> ' . $row['description'] . '</div> 
				    		  	 <div class="col-lg-3 cartLine' . $num . '">$' . $row['cost'] . '</div> 
				    		  	 <div class="col-lg-3 cartLine' . $num . '">'. $row['fullQuantity'] . '</div>
				    	      </div> ';
				    	$overallTotal += $row['cost'];
				    	if($num < 1)
		               	{
		                	$num++;
		                }else
		                {
							$num = 0;
		                }
		            }
				}
				echo '<div class="row product" id="totals"> 
				    		  	 <div class="col-lg-3 rightAlign' . $num . '">Total: $' . $overallTotal . '.00</div> 
				    	      </div> ';
			?>
			</div>
			<button onclick="window.location.href='updateCartAfterPurchase.php'">Confirm Purchase</button>
		</div>
	</body>
	<div class="container wrapper" id="Not_Ajax_Output">
	</div>
	<?php require_once 'footer.php' ?>
</html>