<?php
// Set up the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "house_loan_management_system";

$conn = mysqli_connect("localhost", "root", "", "house_loan_management_system");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Check if the email is already registered
$email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
$result = mysqli_query($conn, $email_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) {
  if ($user['email'] === $email) {
    echo 'Email already exists';
  }
} else {
  // Insert the new user into the database
  $insert_query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
  mysqli_query($conn, $insert_query);
  echo 'Registration successful';
}
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up </title>
        <style>
            .signup-form {
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
                max-width: 400px;
                margin: 0 auto;
            }
            h2 {
                text-align: center;
                margin-bottom: 20px;
            }
            .form-group {
                margin-bottom: 20px;
            }
            label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
            input[type="text"],
            input[type="email"],
            input[type="password"] {
                width: 95%;
                padding: 10px;
                border-radius: 5px;
                border: none;
                background-color: #f5f5f5;
            }
            button[type="submit"] {
                background-color: #4CAF50;
                color: #fff;
                border: none;
                border-radius: 5px;
                padding: 10px 20px;
                cursor: pointer;
                width: 100%;
            }
            button[type="submit"]:hover {
                background-color: #3e8e41;
            }
        </style>
    </head>
    <body>
        <main>
            <div class="signup-form">
                <h2>Sign Up</h2>
                <form method="post" action="sign-up.php">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirm-password" name="confirm-password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">Sign Up</button>
                    </div>
                </form>
            </div>

        </main>
    </body>

</html>