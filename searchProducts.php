<?php
	require_once 'sessionStart.php'; 
	require_once '../../databaseClasses/productClass.php';

    $product = new productDataAccess();
    $data = $product->readDataForSearch($_POST["id"]);

	foreach ($data[1] as $row) {
	    echo '<div class="col-4-lg subcategoryColor' . $num . ' product" id="' . $row['a.id']. '">' . '<img src="data:image/jpeg;base64,' . base64_encode($row['b.image']) . '"width="100px"/> ' . $row['a.name'] . ' ' . $row['a.description'] . ' ' . $row['a.cost'] . ' <a href="#">Add to Cart</a></div>';
	    if($num < 1){
    		$num++;
    	}else
    	{
    		$num = 0;
    	}
	}