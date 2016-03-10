<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 

require_once 'sessionStart.php';
require_once 'databaseClasses/categoryClass.php';
require_once 'databaseClasses/subcategoryClass.php';

$category = new categoryDataAccess();
$returnValues = $category->readData(1);

foreach ($returnValues as $row) {
	$row['id'];
	$quantity = $row['quantity'];
}