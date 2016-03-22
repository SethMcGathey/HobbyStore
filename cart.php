<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sessionStart.php';
require_once 'accessDatabaseClass.php'; 
require_once 'databaseClasses/transactionClass.php';
 ?>
<!DOCTYPE html>
<html lang="en">
	<?php require_once 'header.php' ?>
	<body>
		<?php require_once 'navigation.php' ?>
		<div class="container" id="Not_Ajax_Output">
			<h1>Cart</h1>
<!--
			<div class="row">
				<div class="col-lg-3">
				</div>
				<div class="col-lg-3">
					<p>Description</p>
				</div>
				<div class="col-lg-3">
					<p>Price</p>
				</div>
				<div class="col-lg-3">
					<p>Quantity</p>
				</div>
			</div>
-->
			<?php
				$num=0;
				$transaction = new transactionDataAccess();
                foreach($transaction->readDataForCart($_SESSION['customerid'])[1] as $row)
				{
					if($row['fullQuantity'] != 0){
						
						echo '<div class="row product" id="' . $row['id'] . '"> 
				    			 <div class="col-lg-3 cartLine' . $num . '"><img alt="' . $row['description'] . '" title="' . $row['description'] . '"  src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"width="100px"/> </div>
				    		  	 <div class="col-lg-3 cartLine' . $num . '">' . $row['name'] . '<br> ' . $row['description'] . '</div> 
				    		  	 <div class="col-lg-3 cartLine' . $num . '">$' . $row['cost'] . '</div> 
				    		  	 <div class="col-lg-3 cartLine' . $num . '">
				    	   		 <a class="minusButtons" href="updateQuantity.php?id=' . $row['id'] . '&direction=minus">-</a>
				    			 '. $row['fullQuantity'] . '
				    			 <a class="plusButtons" href="updateQuantity.php?id=' . $row['id'] . '&direction=plus">+</a>
				    			 <div class="rightAlign"><a href="updateQuantity.php?id=' . $row['id'] . '&remove=remove">Remove</a></div>
				    	 	  	 </div>
				    	      </div> ';
				    	if($num < 1)
		               	{
		                	$num++;
		                }else
		                {
							$num = 0;
		                }
		            }
				}
			?>
			<button onclick="window.location.href='choosePurchaseAddress.php'">Purchase</button>

		</div>


		<div class="container-fluid" id="ajax_Output">
		</div>

	</body>

	<?php require_once 'footer.php' ?>
</html>