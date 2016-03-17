<?php
require_once '../../sessionStart.php'; 

require_once '../../accessDatabaseClass.php'; 
require_once '../../databaseClasses/customerClass.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: index.php");
    } else {
      $customer = new customerDataAccess();
      $data = $customer->readDataById($id)[1][0];
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
                        <h3>Read a Customer</h3>
                    </div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">First Name</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['first_name'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Last Name</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['last_name'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['email'];?>
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
                        <label class="control-label">Date of Birth</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['dob'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Gender</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['gender'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['password'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Permission</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['permission'];?>
                            </p>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <p class="checkbox">
                                <?php echo $data['username'];?>
                            </p>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>


                    </div>
                </div>

    </div> <!-- /container -->
  </body>
</html>
~             