<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 
require_once 'databaseClasses/productClass.php';

    $product = new productDataAccess();
    $data = $product->readDataForSearch($_GET["id"]);

	foreach ($data[1] as $row) {
	    echo '<div class="col-4-lg subcategoryColor' . $num . ' product" id="' . $row['a.id']. '">' . '<img src="data:image/jpeg;base64,' . base64_encode($row['b.image']) . '"width="100px"/> ' . $row['a.name'] . ' ' . $row['a.description'] . ' ' . $row['a.cost'] . ' <a href="#">Add to Cart</a></div>';
	    if($num < 1){
    		$num++;
    	}else
    	{
    		$num = 0;
    	}
	}