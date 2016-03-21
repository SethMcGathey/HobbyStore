<?php
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/transactionClass.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../header.php' ?>

<body>
    <?php require_once '../navigation.php' ?>
    <div class="container">

            <div class="row">
                <h3>Transaction</h3>
            </div>
            <div class="row">
                <p>
                    <a href="transactionCreate.php" class="btn btn-success">Create</a>
                </p>

                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Cart</th>
                          <th>Timestamp</th>
                          <th>Payment Id</th>
                          <th>Customer Id</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $transaction = new transactionDataAccess();
                        foreach ($transaction->readData()[1] as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['cart'] . '</td>';
                                echo '<td>'. $row['timestamp'] . '</td>';
                                echo '<td>'. $row['payment_id'] . '</td>';
                                echo '<td>'. $row['customer_id'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="transactionRead.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="transactionUpdate.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="transactionDelete.php?id='.$row['id'].'">Delete</a>';
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