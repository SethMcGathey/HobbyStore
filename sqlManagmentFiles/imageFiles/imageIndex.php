<?php
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/imageClass.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <p>
                    <a href="imageCreate.php" class="btn btn-success">Create</a>
                </p>

                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Description</th>
                          <th>Featured</th>
                          <th>Image</th>
                          <th>Product Id</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $image = new imageDataAccess();
                        foreach ($image->readData()[1] as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['description'] . '</td>';
                                echo '<td>'. $row['featured'] . '</td>';
                                echo '<td><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"width="100px" class="homePageImages"/></td>';
                                echo '<td>'. $row['product_id'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="imageRead.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="imageUpdate.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="imageDelete.php?id='.$row['id'].'">Delete</a>';
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