<?php
session_start(); 
if(empty($_SESSION["username"])) 
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
    .container {
        border: 1px solid black;
        width: 1020px;
    }

    img {
        width: 100px;
        height: 100px;
    }
    </style>
</head>
<body>
    <?php include("navbar.php"); ?>
    
    <div class="container">
    <label for="img">Profile Picture: </label> <br>
    <img src="../files/<?php echo $_SESSION['all_data']['img']; ?>" alt="Profile Picture"> <br>
    <label for="name">Name: </label><?php echo $_SESSION['fullname']; ?> <br>
    <label for="username">Username: </label><?php echo $_SESSION['all_data']['username']; ?> <br>
    <label for="gender">Gender: </label><?php echo $_SESSION['all_data']['gender']; ?> <br>
    <label for="dob">Date of birth: </label><?php echo $_SESSION['all_data']['dob']; ?> <br>
    <label for="email">Email: </label><?php echo $_SESSION['all_data']['email']; ?> <br>
    <label for="usrtype">User type: </label><?php echo $_SESSION['all_data']['utype']; ?> <br>
    </div>

    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>
</html>