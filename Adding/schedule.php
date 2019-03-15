<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styleAdmin.css"> 
</head>
<body>

<div id="background"> 
<div id="time"> </div>









<div id="list">
Aktualny harmonogram:
<div id="list2">

<?php
include 'scheduleMySQL.php';
$l = getList();
foreach($l as list($type, $id, $url, $time)){
	echo "<div>" . $type . "  " . $id . "  " . $url . "  " . $time . "</div>";
}

?>

</div>

<div id="end"> __ </div>
</div>


<div id="updateSettings">
	<input type="submit" id="inputSubmit" onclick="javascript:send()" value="Zaktualizuj harmonogram">
</div>

<script type="text/javascript" src="scheduleScript.js"></script>
</body>
</html>