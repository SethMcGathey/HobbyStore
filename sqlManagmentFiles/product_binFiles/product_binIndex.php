<?php
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/product_binClass.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../header.php' ?>

<body>
    <?php require_once '../navigation.php' ?>
    <div class="container">

            <div class="row">
                <h3>Product Bin</h3>
            </div>
            <div class="row">
                <p>
                    <a href="product_binCreate.php" class="btn btn-success">Create</a>
                </p>

                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Stock</th>
                          <th>Bin Id</th>
                          <th>Product Id</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $product_bin = new product_binDataAccess();
                        foreach ($product_bin->readData()[1] as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['stock'] . '</td>';
                                echo '<td>'. $row['bin_id'] . '</td>';
                                echo '<td>'. $row['product_id'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="product_binRead.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="product_binUpdate.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="product_binDelete.php?id='.$row['id'].'">Delete</a>';
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