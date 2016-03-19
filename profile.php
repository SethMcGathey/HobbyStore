<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 

require_once 'accessDatabaseClass.php';   
require_once 'databaseClasses/addressClass.php';
require_once 'databaseClasses/paymentClass.php';
require_once 'databaseClasses/customerClass.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'header.php' ?>
<body>
  <?php require_once 'navigation.php' ?>
    <div class="container">
            <div class="row">
                <h3>Choose Payment Address</h3>
            </div>
            <div class="row">
                <p>
                    <a href="addressCreate.php" class="btn btn-success">Create New Address</a>
                </p>
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email Address</th>
                          <th>Phone</th>
                          <th>Date of Birth</th>
                          <th>Gender</th>
                          <th>Password</th>
                          <th>Permission</th>
                          <th>Username</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $customer = new customerDataAccess();
                        foreach ($customer->readDataById($_SESSION['customerid'])[1] as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['first_name'] . '</td>';
                                echo '<td>'. $row['last_name'] . '</td>';
                                echo '<td>'. $row['email'] . '</td>';
                                echo '<td>'. $row['phone'] . '</td>';
                                echo '<td>'. $row['dob'] . '</td>';
                                echo '<td>'. $row['gender'] . '</td>';
                                echo '<td>'. $row['password'] . '</td>';
                                echo '<td>'. $row['permission'] . '</td>';
                                echo '<td>'. $row['username'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="sqlManagmentFiles/read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="sqlManagmentFiles/update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="sqlManagmentFiles/delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                                echo '</tr>';
                       }
                      ?>
                      </tbody>
                </table>
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>City</th>
                          <th>Country</th>
                          <th>State</th>
                          <th>Street One</th>
                          <th>Street Two</th>
                          <th>Zipcode</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $address = new addressDataAccess();
                        foreach($address->readDataByCustomerId($_SESSION['customerid'])[1] as $innerRow)
                        {
                            echo '<tr>';
                              echo '<td>' . $innerRow['city'] . '</td>';
                              echo '<td>' . $innerRow['country'] . '</td>';
                              echo '<td>' . $innerRow['state'] . '</td>';
                              echo '<td>' . $innerRow['street_one'] . '</td>';
                              echo '<td>' . $innerRow['street_two'] . '</td>';
                              echo '<td>' . $innerRow['zipcode'] . '</td>';
                              echo '<td width=250>';
                              echo '<a class="btn" href="sqlManagmentFiles/setAddress.php?purchaseShipping=payment&addressid=' . $innerRow['id'] . '">Read</a>';
                              echo ' ';
                              echo '<a class="btn btn-success" href="sqlManagmentFiles/addressUpdate.php?id=' . $innerRow['id'] . '">Update</a>';
                              echo ' ';
                              echo '<a class="btn btn-danger" href="sqlManagmentFiles/addressDelete.php?id=' . $innerRow['id'] . '">Delete</a>';
                              echo '</td>';
                            echo '</tr>';
                        }
                      ?>
                      </tbody>
                </table>
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
                        foreach ($payment->readDataByCustomerId($_SESSION['customerid'])[1] as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['card_full_name'] . '</td>';
                                echo '<td>'. $row['card_number'] . '</td>';
                                echo '<td>'. $row['card_security'] . '</td>';
                                echo '<td>'. $row['expires_month'] . '</td>';
                                echo '<td>'. $row['expires_year'] . '</td>';
                                echo '<td>'. $row['payment_type'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="sqlManagmentFiles/setPaymentID.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="sqlManagmentFiles/paymentUpdate.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="sqlManagmentFiles/paymentDelete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                                echo '</tr>';
                       }
                      ?>
                      </tbody>
                </table>

        </div>
    </div> <!-- /container -->
  </body>
</html>
