<?php
session_start(); 
if(empty($_SESSION["username"])) 
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

if($_SESSION['utype'] != "admin") // Redirecting to home if user is not admin type
{
    header("location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <style type ="text/css"></style>




 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
<?php include("navbar.php"); ?>
    <h1>Admin Panel</h1>
    

<table>

<tr>

<th>username</th>
<th>Gender</th>
<th>Email</th>
<th>Birthday</th>
<th>User Type</th>


</tr>

<?php

$conn = mysqli_connect("localhost","root","","ticketing_sys");
 
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }


    $sql ="SELECT username, gender,email,dob,utype from users";
    $result =$conn-> query($sql);

    if($result-> num_rows > 0)
    {
        while ($row = $result -> fetch_assoc())
        {
            echo "<tr><td>". $row["username"] . "</td><td>". $row ["gender"]."</td><td>". $row ["email"]."</td><td>". $row ["dob"]."</td><td>". $row ["utype"]."</td></tr>";
        }
        echo "</table>";

    }

    else
    {
        echo "0 result";
    }

    $conn -> close();


?>

<br>
<br>
<br>


<input type="button" name="Add Movies" value="Add Movies">  

<input type="button" name="Delete Movies" value="Delete Movies">  

<input type="button" name="Remove Seller" value="Remove Seller">

<input type="button" name="Remove Buyer" value="Remove Buyer">

<input type="button" name="Verify selle" value="Verify selle">




</table>






<footer>
        <?php include("footer.php"); ?>
    </footer>



</body>
</html>