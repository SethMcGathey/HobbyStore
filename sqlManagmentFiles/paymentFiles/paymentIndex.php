<?php
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/paymentClass.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../header.php' ?>

<body>
    <?php require_once '../navigation.php' ?>
    <div class="container">

            <div class="row">
                <h3>Payment</h3>
            </div>
            <div class="row">
                <p>
                    <a href="paymentCreate.php" class="btn btn-success">Create</a>
                </p>

                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name on Card</th>
                          <th>Card Number</th>
                          <th>Security Number</th>
                          <th>Expiration Month</th>
                          <th>Experation Year</th>
                          <th>Payment Type</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $payment = new paymentDataAccess();
                        foreach ($payment->readData()[1] as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['card_full_name'] . '</td>';
                                echo '<td>'. $row['card_number'] . '</td>';
                                echo '<td>'. $row['card_security'] . '</td>';
                                echo '<td>'. $row['expires_month'] . '</td>';
                                echo '<td>'. $row['expires_year'] . '</td>';
                                echo '<td>'. $row['payment_type'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="paymentRead.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="paymentUpdate.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="paymentDelete.php?id='.$row['id'].'">Delete</a>';
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