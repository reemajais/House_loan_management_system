<?php
session_start();
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT id, email, password FROM users WHERE email = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("s", $param_email);
        $param_email = $email;
        
        if($stmt->execute()){
            $stmt->store_result();
            
            if($stmt->num_rows == 1){                    
                $stmt->bind_result($id, $email, $hashed_password);
                
                if($stmt->fetch()){
                    if(password_verify($password, $hashed_password)){
                        session_start();
                        
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["email"] = $email;                            
                        
                        header("location: dashboard.php");
                    } else{
                        $login_err = "Invalid username or password.";
                    }
                }
            } else{
                $login_err = "Invalid username or password.";
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        $stmt->close();
    }
    
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Email</label>
            <input type="text" name="email" required>
        </div>    
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>
    <?php
        if(!empty($login_err)){
            echo '<div>' . $login_err . '</div>';
        }
    ?>
</body>
</html>
