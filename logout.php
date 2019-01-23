<?php
$_SESSION=array();
$params=session_get_cookie_params();

setcookie('username','null',0,'','','','');
setcookie('loggedin','null',0,'','','','');
session_destroy();

echo "document.body.innerHTML += '<form id=\"dynForm\" action=\"strona.php\" method=\"post\"><input type=\"hidden\" name=\"refresh\" value=\"a\"></form>'; document.getElementById(\"dynForm\").submit(););";

header('Location: strona.php?refresh=1');
?>