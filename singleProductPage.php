<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 

require_once 'accessDatabaseClass.php'; 
require_once 'databaseClasses/productClass.php';
?>
<?php include 'sessionStart.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <?php require 'header.php' ?>
  <body>
    <?php require 'navigation.php' ?>
    <div class="container-fluid" id="Not_Ajax_Output">
      <h1>products.php</h1>


      <?php
        $product = new productDataAccess();
        $data = $product->readProductForSinglePageData($id)[1];
        
        if(isset($_GET['id']))
        {
          foreach ($data as $row) {
              echo '<div class="col-4-lg subcategoryColor' . $num . ' product" id="' . $row['a.id']. '">' . '<img src="data:image/jpeg;base64,' . base64_encode($row['b.image']) . '"width="100px"/> ' . $row['a.name'] . ' ' . $row['a.description'] . ' ' . $row['a.cost'] . ' <a href="addToCart.php?id=' . $row['a.id'] . '">Add to Cart</a></div>';
          }

        }else
        {
          header('products.php');
        }
      ?>


    </div>
    <div class="container-fluid" id="ajax_Output">

    </div>
  </body>

  <?php require 'footer.php' ?>
</html>