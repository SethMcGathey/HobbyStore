<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once '../../sessionStart.php'; 
require_once '../../database.php';

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/addressClass.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
  <?php require_once '../../navigation.php' ?>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <p>
                    <a href="addressCreate.php" class="btn btn-success">Create</a>
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
                        print_r($address->readData());
                        foreach($address->readData() as $row)
                        {
                            echo '<tr>';
                              echo '<td>'. $row[1][0]['city'] . '</td>';
                              echo '<td>'. $row[1][0]['country'] . '</td>';
                              echo '<td>'. $row[1][0]['state'] . '</td>';
                              echo '<td>'. $row[1][0]['street_one'] . '</td>';
                              echo '<td>'. $row[1][0]['street_two'] . '</td>';
                              echo '<td>'. $row[1][0]['zipcode'] . '</td>';
                              echo '<td width=250>';
                              echo '<a class="btn" href="addressRead.php?id='.$row[1][0]['id'].'">Read</a>';
                              echo ' ';
                              echo '<a class="btn btn-success" href="addressUpdate.php?id='.$row[1][0]['id'].'">Update</a>';
                              echo ' ';
                              echo '<a class="btn btn-danger" href="addressDelete.php?id='.$row[1][0]['id'].'">Delete</a>';
                              echo '</td>';
                            echo '</tr>';
                        }
                      /*
                       $pdo = Database::connect();
                       $sql = 'SELECT * FROM address ORDER BY id DESC';
                       foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['city'] . '</td>';
                                echo '<td>'. $row['country'] . '</td>';
                                echo '<td>'. $row['state'] . '</td>';
                                echo '<td>'. $row['street_one'] . '</td>';
                                echo '<td>'. $row['street_two'] . '</td>';
                                echo '<td>'. $row['zipcode'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="addressRead.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="addressUpdate.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="addressDelete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                                echo '</tr>';
                       }
                       Database::disconnect();*/
                      ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
