<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/addressClass.php';

    $id = 0;

    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];

        $address = new addressDataAccess();
        $address->deleteData($id);
        header("Location: addressIndex.php");

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
    <?php require '../../navigation.php' ?>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Delete a Address</h3>
                    </div>

                    <form class="form-horizontal" action="addressDelete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Are you sure you want to delete?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="addressIndex.php">No</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>