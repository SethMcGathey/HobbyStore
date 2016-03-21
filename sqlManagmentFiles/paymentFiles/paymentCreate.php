<?php

    require_once '../../database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $card_full_nameError = null;
        $card_numberError = null;
        $card_securityError = null;
        $expires_monthError = null;
        $expires_yearError = null;
        $payment_type_idError = null;

        // keep track post values
        $card_full_name = $_POST['card_full_name'];
        $card_number = $_POST['card_number'];
        $card_security = $_POST['card_security'];
        $expires_month = $_POST['expires_month'];
        $expires_year = $_POST['expires_year'];
        $payment_type_id = $_POST['payment_type_id'];

        // validate input
        $valid = true;
        if (empty($card_full_name)) {
            $card_full_nameError = 'Please enter Name on Card';
            $valid = false;
        }

        if (empty($card_number)) {
            $card_numberError = 'Please enter Card Number';
            $valid = false;
        }

        if (empty($card_security)) {
            $card_securityError = 'Please enter Security Number';
            $valid = false;
        }

        if (empty($expires_month)) {
            $expires_monthError = 'Please enter Expiration Month';
            $valid = false;
        }

        if (empty($expires_year)) {
            $expires_yearError = 'Please enter expires_year';
            $valid = false;
        }

        if (empty($payment_type_id)) {
            $payment_type_idError = 'Please enter Payment Type';
            $valid = false;
        }


        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO payment (card_full_name,card_number,card_security,expires_month,expires_year,payment_type_id) values(?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($card_full_name, $card_number, $card_security,$expires_month,$expires_year,$payment_type_id));
            Database::disconnect();
            header("Location: paymentIndex.php");
        }
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
                        <h3>Create a Payment</h3>
                    </div>

                    <form class="form-horizontal" action="paymentCreate.php" method="post">
                      <div class="control-group <?php echo !empty($card_full_nameError)?'error':'';?>">
                        <label class="control-label">Name on Card</label>
                        <div class="controls">
                            <input name="card_full_name" type="text"  placeholder="Name on Card" value="<?php echo !empty($card_full_name)?$card_full_name:'';?>">
                            <?php if (!empty($card_full_nameError)): ?>
                                <span class="help-inline"><?php echo $card_full_nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($card_numberError)?'error':'';?>">
                        <label class="control-label">Card Number</label>
                        <div class="controls">
                            <input name="card_number" type="text"  placeholder="Card Number" value="<?php echo !empty($card_number)?$card_number:'';?>">
                            <?php if (!empty($card_numberError)): ?>
                                <span class="help-inline"><?php echo $card_numberError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($card_securityError)?'error':'';?>">
                        <label class="control-label">Security Number</label>
                        <div class="controls">
                            <input name="card_security" type="text" placeholder="Security Number" value="<?php echo !empty($card_security)?$card_security:'';?>">
                            <?php if (!empty($card_securityError)): ?>
                                <span class="help-inline"><?php echo $card_securityError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($expires_monthError)?'error':'';?>">
                        <label class="control-label">Expiration Month</label>
                        <div class="controls">
                            <input name="expires_month" type="text"  placeholder="Expiration Month" value="<?php echo !empty($expires_month)?$expires_month:'';?>">
                            <?php if (!empty($expires_monthError)): ?>
                                <span class="help-inline"><?php echo $expires_monthError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($expires_yearError)?'error':'';?>">
                        <label class="control-label">Experation Year</label>
                        <div class="controls">
                            <input name="expires_year" type="text"  placeholder="Experation Year" value="<?php echo !empty($expires_year)?$expires_year:'';?>">
                            <?php if (!empty($expires_yearError)): ?>
                                <span class="help-inline"><?php echo $expires_yearError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($payment_type_idError)?'error':'';?>">
                        <label class="control-label">Payment Type</label>
                        <div class="controls">
                            <input name="payment_type_id" type="text"  placeholder="Payment Type" value="<?php echo !empty($payment_type_id)?$payment_type_id:'';?>">
                            <?php if (!empty($payment_type_idError)): ?>
                                <span class="help-inline"><?php echo $payment_type_idError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="paymentIndex.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
    <?php require_once '../footer.php' ?>
  </body>
</html>