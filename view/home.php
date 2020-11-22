<?php
session_start(); 
if(empty($_SESSION["username"])) 
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

    <?php include("navbar.php"); ?>
    <?php
        include("../control/db.php");

        $con = new db();
        $conobj = $con->OpenCon();
        $res = $con->CheckUserType($conobj, $username);
        $con->CloseCon($conobj);

        $_SESSION['all_data'] = $res;
        $_SESSION['utype'] = $res['utype'];
        $_SESSION['fullname'] = $res['fullname'];
    ?>
    <h1>Welcome <?php echo $_SESSION['fullname']; ?></h1>
    <?php
        if($_SESSION['utype'] == "customer")
        {
            include("cust_message.php");
        }
    ?>
    
    </div>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>
</html>