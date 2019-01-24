<?php
session_start();
include "connect.php";
$sql=sprintf("SELECT * FROM users where sess=",mysqli_real_escape_string($conn,$_COOKIE['username']));
$result=$conn->query($sql);
if($_SESSION['login_string']!=$_COOKIE['username']&&$result->num_rows!=1)
{header("Location: /strona.php");}
?>