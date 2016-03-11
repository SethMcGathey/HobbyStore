<?php
    require_once 'sessionStart.php'; 
    require_once 'database.php';
    require_once 'databaseClasses/subcategoryClass.php';

    $subcategory = new subcategoryDataAccess();          
    $num = 0;
    foreach($subcategory->readDataByCategoryID(1)[$_POST["id"]] as $innerRow)
    {
        echo '<a href="products.php?id=' . $innerRow['id']. '"><div class="col-lg-12 subcategoryColor' . $num . '" id="' . $innerRow['id']. '"><p class="leftRight' . $num . '"">' . $innerRow['name'] . '</p></div></a>';
        if($num < 1)
        {
            $num++;
        }else
        {
            $num = 0;
        }
    }


/* replacment
<?php
    $subcategory = new subcategoryDataAccess();
 
    $num = 0;
    foreach($subcategory->readDataByCategoryID(1)[$categoryID] as $innerRow)
    {
        echo '<a href="products.php?id=' . $innerRow['id']. '"><div class="col-lg-12 subcategoryColor' . $num . '" id="' . $innerRow['id']. '"><p class="leftRight' . $num . '"">' . $innerRow['name'] . '</p></div></a>';
        if($num < 1)
        {
            $num++;
        }else
        {
            $num = 0;
        }
    }
?>*/