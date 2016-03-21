<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once '../../sessionStart.php'; 
require_once '../../database.php';

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/tagClass.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../header.php' ?>

<body>
    <?php require_once '../navigation.php' ?>
    <div class="container">

      <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <p>
                    <a href="tagCreate.php" class="btn btn-success">Create</a>
                </p>

                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $tag = new tagDataAccess();
                        foreach ($tag->readData()[1] as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['name'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="tagRead.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="tagUpdate.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="tagDelete.php?id='.$row['id'].'">Delete</a>';
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