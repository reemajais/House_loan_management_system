<!DOCTYPE html>
<html>
<head>
	<title>User Signup</title>
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>
	<?php
		// define variables and set to empty values
		$nameErr = $emailErr = $passwordErr = "";
		$name = $email = $password = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["name"])) {
				$nameErr = "Name is required";
			} else {
				$name = test_input($_POST["name"]);
				// check if name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
					$nameErr = "Only letters and white space allowed";
				}
			}
			
			if (empty($_POST["email"])) {
				$emailErr = "Email is required";
			} else {
				$email = test_input($_POST["email"]);
				// check if email address is well-formed
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailErr = "Invalid email format";
				}
			}
			
			if (empty($_POST["password"])) {
				$passwordErr = "Password is required";
			} else {
				$password = test_input($_POST["password"]);
			}
			
			// if no errors, proceed with database insertion or other actions
			if (empty($nameErr) && empty($emailErr) && empty($passwordErr)) {
				// TODO: add code to insert user data into database or other actions
				echo "<h2>Signup Successful!</h2>";
			}
		}
		
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	
	<h2>User Signup Form</h2>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Name: <input type="text" name="name" value="<?php echo $name;?>">
		<span class="error">* <?php echo $nameErr;?></span>
		<br><br>
		Email: <input type="text" name="email" value="<?php echo $email;?>">
		<span class="error">* <?php echo $emailErr;?></span>
		<br><br>
		Password: <input type="password" name="password" value="<?php echo $password;?>">
		<span class="error">* <?php echo $passwordErr;?></span>
		<br><br>
		<input type="submit" name="submit" value="Signup">
	</form>
</body>
</html>
