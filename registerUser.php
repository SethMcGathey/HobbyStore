<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 

require_once 'accessDatabaseClass.php'; 
require_once 'databaseClasses/customerClass.php';


    $pdo = Database::connect();

	//echo $_SESSION['user'];
	if($_SERVER["REQUEST_METHOD"] == "POST")
	$_SESSION['ErrorMessage'] = "";

	if (!empty($_POST)) {
        foreach($_POST as $key => $value) {
            $_SESSION['myForm'][$key] = $value;
        }
        //print_r($_SESSION['myForm']);
    }
	
	$firstName = NULL;
	$lastName = NULL;
	$username = NULL;
	$phoneNumber = NULL;
	$dob = NULL;
	$gender = NULL; 
	$email = NULL;
	//$_SESSION['user'] = NULL;
	$password = NULL;
	/*echo $_POST['passwordInput'] . "<br>";
	echo $_POST['reenteredPasswordInput'] . "<br>";
	$password = $_POST['passwordInput'];*/
	//echo trim($_POST['passwordInput']) . '<br>';

	if($_POST['passwordInput'] != $_POST['reenteredPasswordInput'])
	{
		$_SESSION['ErrorMessage'] = "Passwords do not match. <br>";
		header('Location: register.php');
	/*}
	else if(trim($_POST['passwordInput']) == ""){
		$_SESSION['ErrorMessage'] = "Please fill out password fields.";
		header('Location: register.php');
		//echo "passwordInput";*/
	}else
	{
		$firstName = $_POST['firstNameInput'];
		$lastName = $_POST['lastNameInput'];
		$username = $_POST['userNameInput'];
		$phoneNumber = $_POST['phoneNumberInput'];
		$dob = $_POST['dobInput'];
		$gender = $_POST['genderInput'];
		$email = $_POST['emailInput'];
		$_SESSION['ErrorMessage'] = "";
		$password = $_POST['passwordInput'];
		//$_SESSION['user'] = $username;
		//echo "Got to the setting of variables <br>";
	//echo isset($_POST['lastNameInput']);
	//echo isset($_POST['userNameInput']);
	//echo isset($_POST['phoneNumberInput']);

		$_SESSION['ErrorMessage'] = array();
		if(trim($firstName) != "")
		{
			array_push($_SESSION['ErrorMessage'], 'First Name left empty.');
		}else if(trim($lastName) != "")
		{
			array_push($_SESSION['ErrorMessage'], 'Last Name left empty.');
		}else if(trim($username) != "")
		{
			array_push($_SESSION['ErrorMessage'], 'Usernam left empty.');
		}else if(trim($phoneNumber) != "")
		{
			array_push($_SESSION['ErrorMessage'], 'Phone Number left empty.');
		}else if(trim($dob) != "")
		{
			array_push($_SESSION['ErrorMessage'], 'Date of birth left empty.');
		}else if(trim($gender) != "")
		{
			array_push($_SESSION['ErrorMessage'], 'Gender left empty.');
		}else if(trim($email) != "")
		{
			array_push($_SESSION['ErrorMessage'], 'Email left empty.');
		}else if(trim($password) != "")
		{
			array_push($_SESSION['ErrorMessage'], 'Password left empty.');
		}

		if(trim($firstName) != "" && trim($lastName) != "" && trim($username) != "" && trim($phoneNumber) != "" && trim($dob) != "" && trim($gender) != "" && trim($email) != "" && trim($password) != "")
		{
			$customer = new customerDataAccess();
			$customer->createData($firstName, $phoneNumber, $dob, $username, $password, $gender, 1, $email, $lastName);
			header('Location: login.php');


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