<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php';
require_once 'databaseClasses/category.php';
require_once 'databaseClasses/subcategory.php';

$category = new categoryDataAccess();
$category->readData(1);

              




