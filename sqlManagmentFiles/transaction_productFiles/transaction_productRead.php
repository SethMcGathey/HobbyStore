<?php
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/transaction_productClass.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: transaction_productIndex.php");
    } else {
        $transaction_product = new transaction_productDataAccess();
        $data = $transaction_product->readDataById($id)[1][0];
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once '../../header.php' ?>

<body>
    <?php require '../../navigation.php' ?>
    <div class="container">
 
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read a Transaction Product</h3>
                    </div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Quantity</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['quantity'];?>
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
                      <div class="control-group">
                        <label class="control-label">Product Id</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['product_id'];?>
                            </p>
                        </div>
                      </div>

                      <div class="form-actions">
                          <a class="btn" href="transaction_productIndex.php">Back</a>
                       </div>


                    </div>
                </div>

    </div> <!-- /container -->
    <?php require_once '../../footer.php' ?>
  </body>
</html>