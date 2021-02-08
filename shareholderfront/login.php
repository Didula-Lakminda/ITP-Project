<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password =  "";
$username_err = $password_err =  "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
	
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // select statement
        $sql = "SELECT shareholderid, username, password, email, shfull_name, share_percentage, dateofbirth, address, nic FROM shareholder WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
      
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // parameters
            $param_username = $username;
            
        
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $shareholderid, $username, $password, $shfull_name);
                    if(mysqli_stmt_fetch($stmt)){
                        if ($_POST['password'] === $password) {
                            // If passwoed is corect start a new session
                            session_start();
                            
                            // Store data in session
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $shareholderid;
                            $_SESSION["username"] = $username;
							$_SESSION["shfull_name"] = $shfull_name;                                                        
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // If password is incorrect display an error message 
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    //  If username doesn't exist display an error message
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
	
</head>
<body>

<body style="background-color:#D5D6D6;">
<center>
    <div style="padding-top:300px;" class="wrapper">
	<img  src="images/sun.jpg" style="width:600px; height:300px; padding-right:300px;">
	<img  src="images/userav.jpg" style="width:100px; height:100px; padding-top:10px;">
        <h2>Shareholder Login</h2><br>
        <p>Please fill in your credentials to login.</p><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            
        </form>
    </div>

</center>    
</body>
</html>