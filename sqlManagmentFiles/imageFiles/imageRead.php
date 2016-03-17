<?php
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/imageClass.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: imageIndex.php");
    } else {
        $image = new imageDataAccess();
        $data = $image->readDataById($id)[1][0];
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
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read a Image</h3>
                    </div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Description</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['description'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Featured</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['featured'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Image</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['image'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Product Id</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['product_id'];?>
                            </p>
                        </div>
                      </div>

                      <div class="form-actions">
                          <a class="btn" href="imageIndex.php">Back</a>
                       </div>


                    </div>
                </div>

    </div> <!-- /container -->
  </body>
</html>