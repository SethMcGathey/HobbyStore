<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 
require_once 'database.php';

require_once 'accessDatabaseClass.php'; 
require_once 'databaseClasses/customerClass.php';

	$_POST['tableName'];

switch ($_POST['tableName']){
	case address:
		$object = new addressDataAccess();
	case bin:
		$object = new binDataAccess();
	case category: 
		$object = new categoryDataAccess();
	case customer:
		$object = new customerDataAccess();
	case customer_address:
		$object = new customer_addressDataAccess();
	case customer_payment:
		$object = new customer_paymentDataAccess();
	case image:
		$object = new imageDataAccess();
	case payment:
		$object = new paymentDataAccess();
	case product:
		$object = new productDataAccess();
	case product_bin:
		$object = new product_binDataAccess();
	case product_tag:
		$object = new product_tagDataAccess();
	case shipment_center:
		$object = new shipment_centerDataAccess();
	case subcategory:
		$object = new subcategoryDataAccess();
	case tag:
		$object = new tagDataAccess();
	case transaction:
		$object = new transactionDataAccess();
	case transaction_address:
		$object = new transaction_addressDataAccess();
	case transaction_product:
		$object = new transaction_productDataAccess();
}

	
	
		if(trim($firstName) != "" && trim($lastName) != "" && trim($username) != "" && trim($phoneNumber) != "" && trim($dob) != "" && trim($gender) != "" && trim($email) != "" && trim($password))
		{
			$customer = new customerDataAccess();
			$customer->createData($firstName, $phoneNumber, $dob, $username, $password, $gender, 1, $email, $lastName);
			header('Location: login3.php');


			/*//echo "Got inside long if statement <br>";
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql="INSERT INTO customer (first_name, phone, dob, username, password, gender, permission, email, last_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		    $q = $pdo->prepare($sql);
		    $q->execute(array($firstName, $phoneNumber, $dob, $username, $password, $gender, 1, $email, $lastName));
	    	header('Location: login.php');*/
		}else
		{
			$_SESSION['ErrorMessage'] =  "Fill in all required fields.";
			header('Location: register.php');
		}
	}

	//echo "made it through everything <br>";
	echo $_SESSION['ErrorMessage'];
	//print_r($_SESSION);
 	Database::disconnect();