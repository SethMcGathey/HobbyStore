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
<?php require_once '../../header.php' ?>

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