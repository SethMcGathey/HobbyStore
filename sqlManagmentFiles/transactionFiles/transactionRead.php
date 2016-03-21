<?php
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/transactionClass.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: transactionIndex.php");
    } else {
        $transaction = new transactionDataAccess();
        $data = $transaction->readDataById($id)[1][0];
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once '../../header.php' ?>

<body>
    <div class="container">
            <?php require_once '../../navigation.php' ?> 
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read a Transaction</h3>
                    </div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Cart</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['cart'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Timestamp</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['timestamp'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Payment Id</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['payment_id'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Customer Id</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['customer_id'];?>
                            </p>
                        </div>
                      </div>

                      <div class="form-actions">
                          <a class="btn" href="transactionIndex.php">Back</a>
                       </div>


                    </div>
                </div>

    </div> <!-- /container -->
  </body>
</html>