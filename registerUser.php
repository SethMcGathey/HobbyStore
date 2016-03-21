<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 
require_once 'databaseClasses/customerClass.php';

    $pdo = Database::connect();

    $array = array();
    array_push($array, 'Errors:');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	$_SESSION['ErrorMessage'] = "";

	if (!empty($_POST)) {
        foreach($_POST as $key => $value) {
            $_SESSION['myForm'][$key] = $value;
        }
    }
	
	$firstName = NULL;
	$lastName = NULL;
	$username = NULL;
	$phoneNumber = NULL;
	$dob = NULL;
	$gender = NULL; 
	$email = NULL;
	$password = NULL;
	$everythingFilled = 1;

	if($_POST['passwordInput'] != $_POST['reenteredPasswordInput'])
	{
		array_push($array, "Passwords do not match. <br>");
		$_SESSION['ErrorMessage'] = $array;
		header('Location: register.php');

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
		{
			$customer = new customerDataAccess();
			$customer->createData($firstName, $phoneNumber, $dob, $username, $password, $gender, 1, $email, $lastName);
			header('Location: login.php');

		}else
		{
			header('Location: register.php?error=true');
		}
	}

 	Database::disconnect();