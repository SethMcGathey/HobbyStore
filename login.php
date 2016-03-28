<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 

require_once 'databaseClasses/categoryClass.php';
require_once 'databaseClasses/subcategoryClass.php';
?>

<!DOCTYPE html>
<html lang="en">
	<?php require_once 'header.php' ?>
	<body>
		<?php require_once 'navigation.php' ?>
		<div class="container" id="">
			<h1>Login</h1>
			<?php
				if(!empty($_GET['error']))
				{
					$array = $_SESSION['ErrorMessage'];
					foreach($array as $row)
					{
						echo '<div class="errorReports">' .  $row . '</div>';
					}
				}
			?>
			<form action="verify.php" method="POST">
				<p>User Name:</p><input type="text" placeholder="User Name" name="usernameInput" id="usernameInput">
				<p>Password:</p><input type="password" placeholder="Password" name="passwordInput" id="passwordInput">
				<button>Log In</button>
			</form>

		</div>

	</body>
	<div class="container-fluid wrapper" id="Not_Ajax_Output">
	</div>
	<?php require_once 'footer.php' ?>
</html>
