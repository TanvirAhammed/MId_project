<?php
session_start(); 
if(empty($_SESSION["username"])) 
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

if($_SESSION['utype'] != "employee") // Redirecting to home if user is not seller type
{
    header("location: home.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Panel</title>
</head>
<body>
    
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>
</html>