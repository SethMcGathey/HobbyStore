<?php
require_once 'sessionStart.php'; 
?>

<!DOCTYPE html>
<html lang="en">
	<?php require_once 'header.php' ?>
	<body>
		<?php require_once 'navigation.php' ?>
		<div class="container" id="">
			<h1>Login</h1>
			<form action="verify.php" method="POST">
				<p>User Name:</p><input type="text" placeholder="User Name" name="usernameInput" id="usernameInput">
				<p>Password:</p><input type="password" placeholder="Password" name="passwordInput" id="passwordInput">
				<button>Log In</button>
			</form>

		</div>

	</body>

	<?php require_once 'footer.php' ?>
</html>
