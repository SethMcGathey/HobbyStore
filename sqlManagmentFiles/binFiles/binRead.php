<?php
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/binClass.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: binIndex.php");
    } else {
        $bin = new binDataAccess();
        $data = $bin->readDataById($id)[1][0];
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once '../header.php' ?>

<body>
    <?php require_once '../navigation.php' ?>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read a Bin</h3>
                    </div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['name'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Shipment Center Id</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['shipment_center_id'];?>
                            </p>
                        </div>
                      </div>

                      <div class="form-actions">
                          <a class="btn" href="binIndex.php">Back</a>
                       </div>


                    </div>
                </div>

    </div> <!-- /container -->
    <?php require_once '../footer.php' ?>
  </body>
</html>