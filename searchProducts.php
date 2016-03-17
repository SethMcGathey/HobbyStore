<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 
require_once 'databaseClasses/productClass.php';

    $product = new productDataAccess();
    $data = $product->readDataForSearch($_GET["id"]);
    //print_r($data);
	foreach ($data[1] as $row) {
	    echo '<div class="col-4-lg subcategoryColor' . $num . ' product" id="' . $row['id']. '">' . '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"width="100px"/> ' . $row['name'] . ' ' . $row['description'] . ' ' . $row['cost'] . ' <a href="#">Add to Cart</a></div>';
	    if($num < 1){
    		$num++;
    	}else
    	{
    		$num = 0;
    	}
	}