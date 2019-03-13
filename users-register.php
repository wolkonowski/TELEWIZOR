<?php
include "connect.php";
if(isset($_POST['username'])&&!empty($_POST['username'])&&!empty($_POST['psw']))
{
    $ps=hash("sha256",$_POST['psw']);
    $username=$_POST['username'];
    $sql=sprintf("insert into users(username, pass) VALUES ('%s', '%s');",mysqli_real_escape_string($conn,$username),$ps);

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
