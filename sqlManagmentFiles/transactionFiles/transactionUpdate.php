<?php
    require_once '../../database.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: transactionIndex.php");
    }

    if ( !empty($_POST)) {
        // keep track validation errors
        $cartError = null;
        $timestampError = null;
        $payment_idError = null;
        $customer_idError = null;

        // keep track post values
        $cart = $_POST['cart'];
        $timestamp = $_POST['timestamp'];
        $payment_id = $_POST['payment_id'];
        $customer_id = $_POST['customer_id'];

        // validate input
        $valid = true;
        if (empty($cart)) {
            $cartError = 'Please enter Cart';
            $valid = false;
        }

        if (empty($timestamp)) {
            $timestampError = 'Please enter Cart';
            $valid = false;
        }

        if (empty($payment_id)) {
            $payment_idError = 'Please enter Payment Id';
            $valid = false;
        }

        if (empty($customer_id)) {
            $customer_idError = 'Please enter Customer Id';
            $valid = false;
        }


        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE transaction  set cart = ?, timestamp = ?, payment_id = ?, customer_id =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($cart,$timestamp,$payment_id,$customer_id,$id));
            Database::disconnect();
            header("Location: transactionIndex.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM transaction where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $cart = $data['cart'];
        $timestamp = $data['timestamp'];
        $payment_id = $data['payment_id'];
        $customer_id = $data['customer_id'];
        Database::disconnect();
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
                        <h3>Update a Transaction</h3>
                    </div>

                    <form class="form-horizontal" action="transactionUpdate.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($cartError)?'error':'';?>">
                        <label class="control-label">Cart</label>
                        <div class="controls">
                            <input name="cart" type="text"  placeholder="Cart" value="<?php echo !empty($cart)?$cart:'';?>">
                            <?php if (!empty($cartError)): ?>
                                <span class="help-inline"><?php echo $cartError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($timestampError)?'error':'';?>">
                        <label class="control-label">Timestamp</label>
                        <div class="controls">
                            <input name="timestamp" type="text"  placeholder="Timestamp" value="<?php echo !empty($timestamp)?$timestamp:'';?>">
                            <?php if (!empty($timestampError)): ?>
                                <span class="help-inline"><?php echo $timestampError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($payment_idError)?'error':'';?>">
                        <label class="control-label">Payment Id</label>
                        <div class="controls">
                            <input name="payment_id" type="text" placeholder="Payment Id" value="<?php echo !empty($payment_id)?$payment_id:'';?>">
                            <?php if (!empty($payment_idError)): ?>
                                <span class="help-inline"><?php echo $payment_idError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($customer_idError)?'error':'';?>">
                        <label class="control-label">Customer Id</label>
                        <div class="controls">
                            <input name="customer_id" type="text"  placeholder="Customer Id" value="<?php echo !empty($customer_id)?$customer_id:'';?>">
                            <?php if (!empty($customer_idError)): ?>
                                <span class="help-inline"><?php echo $customer_idError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="transactionIndex.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
    <?php require_once '../footer.php' ?>
  </body>
</html>