<?php
include "connect.php";
if(isset($_POST['username'])&&!empty($_POST['username'])&&!empty($_POST['psw']))
{
    $ps=md5($_POST['psw']);
    $sql="insert into users(username, pass) VALUES ('".$_POST['username']."', '".$ps."');";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
