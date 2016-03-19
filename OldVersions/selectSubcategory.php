<?php
	require_once 'sessionStart.php'; 
	require_once 'database.php';
    $pdo = Database::connect();
	
    $sql = 'SELECT id,name,category_id FROM subcategory WHERE category_id = ' . $_POST["id"];
    $num = 0;
	foreach ($pdo->query($sql) as $row) {
		//echo 'hello';
    	echo '<a href="products.php?id=' . $row['id']. '"><div class="col-lg-12 subcategoryColor' . $num . '" id="' . $row['id']. '"><p class="leftRight' . $num . '"">' . $row['name'] . '</p></div></a>';
 
    	if($num < 1){
    		$num++;
    	}else
    	{
    		$num = 0;
    	}
    	
	}

	Database::disconnect();