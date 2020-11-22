<?php
session_start(); 
if(empty($_SESSION["username"])) 
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

if($_SESSION['utype'] != "customer") // Redirecting to home if user is not customer type
{
    header("location: home.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Tickets</title>
    <style>
        * {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .container {
            margin: 5px;
            padding: 10px;
        }

        .message-home {
            border: 1px solid black;
            width: 50%;
        }

        h1, h2, h3, h4, h5, p {
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php include("navbar.php"); ?> <br>
        <h1>Available sits for booking</h1>
    </div>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>
</html>