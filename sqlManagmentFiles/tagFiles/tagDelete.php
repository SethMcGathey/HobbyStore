<?php
    require '../../database.php';
    $id = 0;

    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];

        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tag  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: tagIndex.php");

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
                        <h3>Delete a Tag</h3>
                    </div>

                    <form class="form-horizontal" action="tagDelete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Are you sure to delete ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="tagIndex.php">No</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>