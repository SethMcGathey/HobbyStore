<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 

require_once 'accessDatabaseClass.php'; 
require_once 'databaseClasses/customerClass.php';


    $pdo = Database::connect();

    $array = array();
    array_push($array, 'Errors:');
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
	$everythingFilled = 1;
	/*echo $_POST['passwordInput'] . "<br>";
	echo $_POST['reenteredPasswordInput'] . "<br>";
	$password = $_POST['passwordInput'];*/
	//echo trim($_POST['passwordInput']) . '<br>';

	if($_POST['passwordInput'] != $_POST['reenteredPasswordInput'])
	{
		array_push($array, "Passwords do not match. <br>");
		$_SESSION['ErrorMessage'] = $array;
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


		if(trim($firstName) == "")
		{
			array_push($array, 'First Name was left empty.');
			$everythingFilled = 0;
		}
		if(trim($lastName) == "")
		{
			array_push($array, 'Last Name was left empty.');
			$everythingFilled = 0;
		}
		if(trim($username) == "")
		{
			array_push($array, 'Username was left empty.');
			$everythingFilled = 0;
		}
		if(trim($phoneNumber) == "")
		{
			array_push($array, 'Phone Number was left empty.');
			$everythingFilled = 0;
		}
		if(trim($dob) == "")
		{
			array_push($array, 'Date of birth was left empty.');
			$everythingFilled = 0;
		}
		if(trim($gender) == "")
		{
			array_push($array, 'Gender was left empty.');
			$everythingFilled = 0;
		}
		if(trim($email) == "")
		{
			array_push($array, 'Email was left empty.');
			$everythingFilled = 0;
		}
		if(trim($password) == "")
		{
			array_push($array, 'Password was left empty.');
			$everythingFilled = 0;
		}

		$_SESSION['ErrorMessage'] = $array;

		if($everythingFilled)
		//if(trim($firstName) != "" && trim($lastName) != "" && trim($username) != "" && trim($phoneNumber) != "" && trim($dob) != "" && trim($gender) != "" && trim($email) != "" && trim($password) != "")
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
			//$_SESSION['ErrorMessage'] =  "Fill in all required fields.";
			header('Location: register.php?error=true');
		}
	}

	//echo "made it through everything <br>";
	//echo $_SESSION['ErrorMessage'];
	//print_r($_SESSION);
 	Database::disconnect();