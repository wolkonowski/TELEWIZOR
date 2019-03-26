<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styleAdmin.css"> 
</head>
<body>

<div id="background"> 
<div id="time"> </div>





<select id="typeAdd" onchange="javascript:changeAdd()">
  <option value="foto">Foto</option>
  <option value="wideo">Wideo</option>
  <option value="tekst">Tekst</option>
</select>
<div id="back">
</div>

<div id="t0"> Podaj date: 
<input type="date" id="t0-value"/>
</div>

<div id="content">Wpisz wartosc: <br/>
<form>
	<textarea id="content-value"></textarea>
</form>
</div>

<div id = "send"> 
<input type="submit" value="Dodaj" onclick="javascript:send()" />
</div>

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