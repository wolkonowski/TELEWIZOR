<?php
session_start();
if($_SESSION['login_string']!=$_COOKIE['username'])
{header("Location: /strona.php");}
?>