<?php

    include("db.php");
    session_start();

    $error_m = "";

    if(isset($_POST['submit']))
    {
        if(empty($_POST['username']) || empty($_POST['password']))
        {
            $error_m = "Please enter username and password correctly.";
        }


        else
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $conn = new db();
            $connobj = $conn->OpenCon();

            $result = $conn->CheckLogin($connobj, "users", $username, $password);

            if(!empty($result) && $result->num_rows > 0)
            {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
            }

            else
            {
                $error_m = "Invalid username or password!";
            }

            $conn->CloseCon($connobj);
        }
    }
?>