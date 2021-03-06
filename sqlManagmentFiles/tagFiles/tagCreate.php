<?php

    require '../../database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;

        // keep track post values
        $name = $_POST['name'];

        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }


        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tag (name) values(?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name));
            Database::disconnect();
            header("Location: tagIndex.php");
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
                        <h3>Create a Tag</h3>
                    </div>

                    <form class="form-horizontal" action="tagCreate.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="tagIndex.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
    <?php require_once '../footer.php' ?>
  </body>
</html>