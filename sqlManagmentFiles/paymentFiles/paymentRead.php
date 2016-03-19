<?php
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/paymentClass.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: paymentIndex.php");
    } else {
        $payment = new paymentDataAccess();
        $data = $payment->readDataById($id)[1][0];
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
                          <a class="btn" href="paymentIndex.php">Back</a>
                       </div>


                    </div>
                </div>

    </div> <!-- /container -->
  </body>
</html>