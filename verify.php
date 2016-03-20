<?php	
require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 

require_once 'databaseClasses/customerClass.php';

	if($_SERVER["REQUEST_METHOD"] == "POST")

	$myusername = $_POST['usernameInput'];
	$mypassword = $_POST['passwordInput'];
    $everythingFilled = 1;

    
    $array = array();
    array_push($array, 'Errors:');
    if(trim($myusername) == "")
    {
        array_push($array, 'Username was left empty.');
        $everythingFilled = 0;
    }
    if(trim($mypassword) == "")
    {
        array_push($array, 'Password was left empty.');
        $everythingFilled = 0;
    }
    if($everythingFilled)
    {
        $customer = new customerDataAccess();
        $data = $customer->readDataByUsernameAndPassword($myusername, $mypassword);        
    
        if(isset($data[1][0]['id']))
        {
            $_SESSION['username'] = $data[1][0]['username'];
            $_SESSION['customerid'] = $data[1][0]['id'];
            $_SESSION['permission'] = $data[1][0]['permission'];
            $_SESSION['user'] = $myusername;
            header('Location: index.php');
        }else
        {
            array_push($array, 'Login failed, please try again.');
            header('Location: login.php?error=true');
        }
    }else
    {
        array_push($array, 'Login failed, please try again.');
        header('Location: login.php?error=true');
    }