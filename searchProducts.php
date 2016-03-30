<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 
require_once 'databaseClasses/productClass.php';

	$num = 0;
    $product = new productDataAccess();
    $data = $product->readDataForSearch($_GET["id"]);
	foreach ($data[1] as $row) {
	    //echo '<div class="col-4-lg subcategoryColor' . $num . ' product" id="' . $row['id']. '">' . '<img alt="' . $row['description'] . '" title="' . $row['description'] . '" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"width="100px"/> ' . $row['name'] . ' ' . $row['description'] . ' ' . $row['cost'] . ' <a href="#">Add to Cart</a></div>';
	    

        echo '<div class="row subcategoryColor product" id="' . $row['a.id']. '">
                <div class="col-lg-6" >
                    <a href="singleProductPage.php?id='.$row['a.id'].'"><img class="productsImage" alt="' . $row['b.description'] . '" title="' . $row['b.description'] . '"  src="data:image/jpeg;base64,' . base64_encode($row['b.image']) . '"width="100px"/></a>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12 name">
                            <span class="nameSpan">' . $row['a.name'] . '</span>
                        </div>
                        <div class="col-lg-6 discription" >
                            <span class="discriptionSpan">' . $row['a.description'] . '</span>
                        </div> 
                        <div class="col-lg-6 price">
                            <span class="priceSpan">$' . $row['a.cost'] . '.00</span>
                        </div>
                        <div class="col-lg-6 addToCart">
                            <span class="addToCartSpan"><a href="addToCart.php?id=' . $row['a.id'] . '">Add to Cart</a></span>
                        </div>
                    </div>
                </div>
            </div>';


        if($num < 1){
    		$num++;
    	}else
    	{
    		$num = 0;
    	}
	}