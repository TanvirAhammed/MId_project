<?php 

    include("../control/logincheck.php");

    if(isset($_SESSION['username'])){
    header("location: home.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        border-radius: 3px;
        background-color: gainsboro;
        display: block;
        max-width: 500px;
        padding: 10px;
        margin: 10% auto 0 auto;
    }

    .form-wrap {
        margin: 10px;
        text-align: center;
        padding: 10px;
    }

    .form-wrap input {
        margin: 5px 0 5px 0;
    }

    </style>
</head>
<body>
    <?php echo "<h1>$error_m</h1>"; ?>
    <div class="container">
        <div class="form-wrap">
            <form action="" method="POST">
            
            <div class="form-grp">
            <label for="username">Username: 
                <input type="text" name="username" id="username" placeholder="Enter your username">
            </label> <br>
            <label for="password">Password: 
                <input type="password" name="password" id="password" placeholder="Enter your password">
            </label>
            </div>

            <div class="sub-button">
            <input type="submit" name="submit" value="Login">
            </div>
            
            </form>
            
            <br>
            <a href="registration.php">Don't have an account? Signup here.</a>
        </div>
    </div>
</body>
</html>