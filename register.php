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

		<div class="container" id="Not_Ajax_Output">
			<h1>Register</h1>
			<?php
				//echo '<div>' .  $_SESSION['ErrorMessage'] . '</div>';
				$array = $_SESSION['ErrorMessage'];
				//print_r($array);
				echo $_SESSION['ErrorMessage'][0];
				foreach($array as $row)
				{
					echo '<div>' .  $row . '</div>';
				}
				if (isset($_SESSION['myForm']) && !empty($_SESSION['myForm'])) {
				    $form_data = $_SESSION['myForm'];
				    unset($_SESSION['myForm']);
				}
			?>
			<form action="registerUser.php" method="POST" onsubmit="return validateForm()">
				<p>First Name:</p><input type="text" placeholder="First Name" name="firstNameInput" id="firstNameInput" value="">
				<p>Last Name:</p><input type="text" placeholder="Last Name" name="lastNameInput" id="lastNameInput" value="">
				<p>User Name:</p><input type="text" placeholder="User Name" name="userNameInput" id="userNameInput" value="">
				<p>Password:</p><input type="password" placeholder="Password" name="passwordInput" id="passwordInput" value="">
				<p>Reenter Password:</p><input type="password" placeholder="Password" name="reenteredPasswordInput" id="reenteredPasswordInput" value="">
				<p>Phone Number:</p><input type="text" placeholder="Phone Number" name="phoneNumberInput" id="phoneNumberInput" value="">
				<p>Date of Birth:</p><input type="text" placeholder="Date of Birth" name="dobInput" id="dobInput" value="">
				<p>Gender:</p><input type="text" placeholder="Gender" name="genderInput" id="genderInput" value="">
				<p>Email:</p><input type="text" placeholder="Email" name="emailInput" id="emailInput" value="">

				<button>Log In</button>
			</form>

		</div>

	</body>

	<?php require_once 'footer.php' ?>
</html>