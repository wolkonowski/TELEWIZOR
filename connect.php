<?php
include "settings.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    $conn = mysqli_connect($servername, $username, $password);
    $conn->set_charset("utf8");
}
?>