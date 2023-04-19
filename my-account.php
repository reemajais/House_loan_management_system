<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}

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

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Sanitize and validate the user input
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // Check if the email and password are correct
  $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $login_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    // Set the user's session variables
    session_start();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];

    // Redirect to the dashboard page
    header('Location: dashboard.php');
  } else {
    // Display an error message if the login details are incorrect
    echo 'Incorrect email or password';
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign In</title>
        <style>

            .signin-form {
                max-width: 400px;
                margin: auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .signin-form h2 {
                margin-top: 0;
                font-size: 24px;
                text-align: center;
            }

            .form-group {
                margin-bottom: 10px;
            }

            .form-group label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }

            .form-group input[type="email"],
            .form-group input[type="password"] {
                width: 95%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
                font-size: 16px;
            }

            button[type="submit"] {
                display: block;
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 5px;
                background-color: #007bff;
                color: #fff;
                font-size: 16px;
                cursor: pointer;
            }

            button[type="submit"]:hover {
                background-color: #0069d9;
            }
        </style>
    </head>
    <body>
        <main>
            <div class="signin-form">
  <form method="post">
    <h2>Sign In</h2>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Sign In</button>
  </form>
</div>

        </main>
    </body>

</html>