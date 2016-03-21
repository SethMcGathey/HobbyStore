<?php
echo "made it";
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/transaction_productClass.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../header.php' ?>

<body>
    <?php require_once '../navigation.php' ?>
    <div class="container">
 
            <div class="row">
                <h3>Transaction Product</h3>
            </div>
            <div class="row">
                <p>
                    <a href="transaction_productCreate.php" class="btn btn-success">Create</a>
                </p>

                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Quantity</th>
                          <th>Transaction Id</th>
                          <th>Product Id</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $transaction_product = new transaction_productDataAccess();
                        foreach ($transaction_product->readData())[1] as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['quantity'] . '</td>';
                                echo '<td>'. $row['transaction_id'] . '</td>';
                                echo '<td>'. $row['product_id'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="transaction_productRead.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="transaction_productUpdate.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="transaction_productDelete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                                echo '</tr>';
                       }
                      ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
    <?php require_once '../footer.php' ?>
  </body>
</html>