<?php
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/productClass.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../../header.php' ?>

<body>
    <?php require '../../navigation.php' ?>
    <div class="container">

            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <p>
                    <a href="productCreate.php" class="btn btn-success">Create</a>
                </p>

                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Cost</th>
                          <th>Description</th>
                          <th>Subcategory Id</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $product = new productDataAccess();
                        foreach ($product->readData()[1] as $row) {
                          echo '<tr>';
                          echo '<td>'. $row['name'] . '</td>';
                          echo '<td>'. $row['cost'] . '</td>';
                          echo '<td>'. $row['description'] . '</td>';
                          echo '<td>'. $row['subcategory_id'] . '</td>';
                          echo '<td width=250>';
                          echo '<a class="btn" href="productRead.php?id='.$row['id'].'">Read</a>';
                          echo ' ';
                          echo '<a class="btn btn-success" href="productUpdate.php?id='.$row['id'].'">Update</a>';
                          echo ' ';
                          echo '<a class="btn btn-danger" href="productDelete.php?id='.$row['id'].'">Delete</a>';
                          echo '</td>';
                          echo '</tr>';
                       }
                      ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
    <?php require_once '../../footer.php' ?>
  </body>
</html>