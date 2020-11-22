<?php
include("../control/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        legend {
            text-transform: uppercase;
        }

        .container {
            display: block;
            max-width: 500px;
            padding: 10px;
            margin: auto;
            position: relative;
        }

        .form-warper {
            margin: 5px 0px 0px 5px;
            padding: 10px;
        }

        .form-group {
            margin: 5px 0px 0px 5px ;
            padding: 10px;
        }

        .form-legend {
            max-width: 65%;
        }

        .form-border {
            border-bottom: 1px solid black;
            max-width: 100%;
        }

        .form-submit {
            margin: 2px 0px 0px 10px ;
            padding: 5px;
            max-width: 50%;
            word-spacing: 5px;
        }

        .form-submit input {
            padding: 4px;
            width: 65px;
            margin-top: 10px;
        }

        .inp_x {
            padding: 5px;
        }

        .container>fieldset {
            margin-top: 25px;
        }

        .container>a {
            margin-top: 10px;
            position: absolute;
            left: 20%;
        }

        footer {
            position: fixed;
            bottom: 1px;
            margin-left: 8%;
            padding: 10px;
        }

        #full-name, #user-email, #username, #password, #cpassword{
            position: absolute;
            left: 46%;
            max-width: 100%;
        } 
    </style>
</head>
<body>

<?php
    $reg_data = array();
    $nameE = $emailE = $usernameE = $passE = $cpassE = $message_x = $message_f = "";
    $namei = $emaili = $usernamei = $gender = $dob = $passi = $utype = "";
    $err_star = "<p style='color: red; display: inline-block'>*</p>";
    $err_pass = $message_s = "";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $reg_data['gender'] = $_POST['gender'];
        $reg_data['dob'] = $_POST['date'];
        $reg_data['usertype'] = $_POST['usertype'];
        if(empty($_POST['name'])){$nameE = $err_star; $message_x = "Please Fillup Required Fields!";}
        else{$reg_data['name'] = $_POST['name'];}
        if(empty($_POST['email'])){$emailE = $err_star;}
        else{$reg_data['email'] = $_POST['email'];}
        if(empty($_POST['username'])){$usernameE = $err_star;}
        else{$reg_data['username'] = $_POST['username'];}
        if(empty($_POST['password'])){$passE = $err_star;} else {
            if($_POST['password'] != $_POST['cpassword'])
            {
                $err_pass = "<h4 style='color: red;'>Password didn't match.</h4>";
            }
            else{$reg_data['password'] = $_POST['password'];}
        }
        if(empty($_POST['cpassword'])){$cpassE = $err_star;}


        $target_dir = "../files/";
        $reg_data['img'] = $_FILES["FileUpload"]["name"];
        $target_file = $target_dir . basename($_FILES["FileUpload"]["name"]);

        if (move_uploaded_file($_FILES["FileUpload"]["tmp_name"], $target_file)) {
            $message_f = "The file ". basename( $_FILES["FileUpload"]["name"]). " has been uploaded.";
        }
        else {
            $message_f = "Sorry, there was an error uploading your file.";
        }

    }
?>


<?php
if(isset($_POST['submit']))
{
    $conn = new db();
    $connobj = $conn->OpenCon();
    $message_s = $conn->UserRegistration($connobj, $reg_data);
    $conn->CloseCon($connobj);
}
?>

    <div class="container">
    <?php
        echo "<h4 style='color: red'>$message_x</h4>";
        echo "<h4 style='color: red'>$message_f</h4>";
        echo $err_pass;
        echo $message_s; 
    ?>
        <fieldset>
            <legend><strong>Registration</strong></legend>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-warper">
                <div class="form-group form-border">
                    <label for="full-name">Name:</label>
                    <input type="text" name="name" id="full-name"/><?php echo $nameE; ?>
                </div>

                <div class="form-group form-border">
                    <label for="user-email">Email:</label>
                    <input type="email" name="email" id="user-email"/><?php echo $emailE; ?>
                </div>

                <div class="form-group form-border">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username"/><?php echo $usernameE; ?>
                </div>

                <div class="form-group form-border">
                    <label for="password">Password:</label></td>
                    <input type="password" name="password" id="password"/><?php echo $passE; ?>
                </div>
                
                <div class="form-group form-border">
                    <label for="cpassword">Confirm Password:</label></td>
                    <input type="password" name="cpassword" id="cpassword"/><?php echo $cpassE; ?>
                </div>

                <div class="form-group form-legend">
                    <fieldset>
                        <legend>Gender</legend>
                        <div class="btn-group btn-group-toggle inp_x" data-toggle="buttons">
                            <label class="btn btn-primary">
                                <input type="radio" name="gender" id="male" value="male" checked="checked"> Male
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="gender" id="female" value="female"> Female
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="gender" id="female" value="female"> Other
                            </label>
                        </div>
                    </fieldset>
                </div>

                <div class="form-group form-legend">
                    <fieldset>
                        <legend>Date of Birth</legend>
                        <div class="inp_x">
                            <input type="date" name="date" id="dob">
                        </div>
                    </fieldset>
                </div>

                <div class="form-group form-legend">
                    <fieldset>
                        <legend>User Type</legend>

                        <div class="btn-group btn-group-toggle inp_x">
                        <select name="usertype" id="usertype">
                            <option value="">Please Choose User Type</option>
                            <option value="customer">Customer</option>
                            <option value="admin">Admin</option>
                            <option value="employee">Employee</option>
                            <option value="support">Support</option>
                        </select>
                        </div>

                    <!--    <div class="btn-group btn-group-toggle inp_x" data-toggle="buttons">
                            <label class="btn btn-primary">
                                <input type="radio" name="usertype" id="customer" value="customer" checked="checked"> Customer
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="usertype" id="admin" value="admin"> Admin
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="usertype" id="employee" value="employee"> Employee
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="usertype" id="support" value="support"> Support
                            </label>
                        </div> -->

                    </fieldset>
                </div>

                <div class="form-group form-legend">
                    <fieldset>
                        <legend>Profile Picture</legend>
                        <div class="inp_x">
                            <input type="file" name="FileUpload" id="FileUpload">
                        </div>
                    </fieldset>
                </div>
                
                <div class="form-submit">
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" value="Reset">
                </div>
            </div>
            </form>
        </fieldset>
        <a href="../index.php">Already have an account? Go back to login page</a>

        <footer>
            <?php include('footer.php') ?>
        </footer>
    </div>
</body>
</html>