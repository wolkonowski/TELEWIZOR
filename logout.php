<?php
$_SESSION=array();
$params=session_get_cookie_params();

setcookie('username','null',0,'','','','');
setcookie('loggedin','null',0,'','','','');
session_destroy();
header('Location: strona.php');
?>