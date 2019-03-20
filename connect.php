<?php
include "settings.php";
$conn =  mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    $conn =  mysqli_connect($servername, $username, $password);
}
$conn->set_charset("utf8");
?>