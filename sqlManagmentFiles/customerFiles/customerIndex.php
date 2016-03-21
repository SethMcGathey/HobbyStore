<?php
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/customerClass.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../../header.php' ?>

<body>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
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
                        foreach ($customer->readData()[1] as $row) {
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
                                echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
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
~              