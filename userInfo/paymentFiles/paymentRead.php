<?php
require_once '../sessionStart.php'; 

require_once '../accessDatabaseClass.php'; 
require_once '../databaseClasses/paymentClass.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: ../profile.php");
    } else {
        $payment = new paymentDataAccess();
        $data = $payment->readDataById($id)[1][0];
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
                        <h3>Read a Payment</h3>
                    </div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Name on Card</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['card_full_name'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Card Number</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['card_number'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Security Number</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['card_security'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Expiration Month</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['expires_month'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Experation Year</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['expires_year'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Payment Type</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['payment_type'];?>
                            </p>
                        </div>
                      </div>
                      <div class="form-actions">
                          <a class="btn" href="../profile.php">Back</a>
                       </div>


                    </div>
                </div>

    </div> <!-- /container -->
    <?php require_once '../footer.php' ?>
  </body>
</html>