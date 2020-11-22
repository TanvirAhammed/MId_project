<?php
class db
{
    
    function OpenCon() 
    {
        $suser = "root";
        $spass = "";
        $server = "localhost";
        $dbname = "ticketing_sys";
        $conn = new mysqli($server, $suser, $spass, $dbname) or die("Connection failed: %s\n".$conn->error);

        return $conn;
    }
    function CheckLogin($conn, $table, $user, $pass)
    {
        $que = "SELECT * FROM " . $table . " WHERE username='" . $user . "' AND userpass='" . $pass . "'";
        $result = $conn->query($que);
        return $result;
    }
    function UserRegistration($conn, $reg_data)
    {
        $def_value = "0"; // Default value of verified column
        $message_s = "";
        $que = "INSERT INTO users VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sqlq = $conn->prepare($que);
        $sqlq->bind_param("sssssssss", $reg_data['username'], $reg_data['name'], $reg_data['gender'], $reg_data['email'], $reg_data['password'],
        $reg_data['dob'], $reg_data['usertype'], $reg_data['img'], $def_value);
        
        if($sqlq->execute())
        {
            $message_s = "<h4>Registration successful...</h4>" ;
        }
        else {
            $message_s =  "<h6>Registration failed...!</h6>";
        }

        return $message_s;
    }
    function CheckUserType($conn, $username)
    {
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($query);
        if($result->num_rows > 0)
        {
            $res = $result->fetch_assoc();
        }
        $result->free();
        return $res;
    }
    function CloseCon($conn)
    {
        $conn->close();
    }
}
?>