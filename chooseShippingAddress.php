<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 

require_once 'accessDatabaseClass.php';   
require_once 'databaseClasses/addressClass.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'header.php' ?>
<body>
  <?php require_once 'navigation.php' ?>
    <div class="container">
            <div class="row">
                <h3>Choose Shipping Address</h3>
            </div>
            <div class="row">
                <p>
                    <a href="addressCreate.php" class="btn btn-success">Create New Address</a>
                </p>

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
                              echo '<a class="btn" href="setAddress.php?purchaseShipping=shipping&addressid=' . $innerRow['id'] . '">Choose</a>';
                              echo ' ';
                              echo '<a class="btn btn-success" href="addressUpdate.php?id=' .$innerRow['id'] . '">Update</a>';
                              echo ' ';
                              echo '<a class="btn btn-danger" href="addressDelete.php?id=' .$innerRow['id'] . '">Delete</a>';
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
