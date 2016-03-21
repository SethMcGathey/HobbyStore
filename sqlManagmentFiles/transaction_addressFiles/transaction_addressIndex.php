<?php
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/transaction_addressClass.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../header.php' ?>

<body>
    <?php require_once '../navigation.php' ?>
    <div class="container">

            <div class="row">
                <h3>Transaction Address</h3>
            </div>
            <div class="row">
                <p>
                    <a href="transaction_addressCreate.php" class="btn btn-success">Create</a>
                </p>

                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Phone</th>
                          <th>Type</th>
                          <th>Address Id</th>
                          <th>Transaction Id</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $transaction_address = new transaction_addressDataAccess();
                        foreach ($transaction_address->readData()[1] as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['phone'] . '</td>';
                                echo '<td>'. $row['type'] . '</td>';
                                echo '<td>'. $row['address_id'] . '</td>';
                                echo '<td>'. $row['transaction_id'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="transaction_addressRead.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="transaction_addressUpdate.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="transaction_addressDelete.php?id='.$row['id'].'">Delete</a>';
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