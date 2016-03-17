<?php
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/shipment_centerClass.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: shipment_centerIndex.php");
    } else {
        $shipment_center = new shipment_centerDataAccess();
        $data = $shipment_center->readDataById($id)[1][0];
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
                        <h3>Read a Shipment Center</h3>
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
                        <label class="control-label">Phone</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['phone'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Address Id</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['address_id'];?>
                            </p>
                        </div>
                      </div>

                      <div class="form-actions">
                          <a class="btn" href="shipment_centerIndex.php">Back</a>
                       </div>


                    </div>
                </div>

    </div> <!-- /container -->
  </body>
</html>