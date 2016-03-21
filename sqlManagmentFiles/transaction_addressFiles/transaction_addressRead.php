<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/transaction_addressClass.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: transaction_addressIndex.php");
    } else {
        $transaction_address = new transaction_addressDataAccess();
        $data = $transaction_address->readDataById($id)[1][0];
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
                        <h3>Read a Transaction Address</h3>
                    </div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Phone</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['phone'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Type</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['type'];?>
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
                      <div class="control-group">
                        <label class="control-label">Transaction Id</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['transaction_id'];?>
                            </p>
                        </div>
                      </div>

                      <div class="form-actions">
                          <a class="btn" href="transaction_addressIndex.php">Back</a>
                       </div>


                    </div>
                </div>

    </div> <!-- /container -->
    <?php require_once '../footer.php' ?>
  </body>
</html>