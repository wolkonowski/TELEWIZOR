<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styleAdmin.css"> 
</head>
<body>

<div id="background"> 
<div id="time"> </div>
<div id="red">Ogłoszenie nie może być puste! </div>

<div id = "changeScheduler"> 
<input type="submit" value="Moje harmonogramy" onclick="javascript:redirect('SchedulerList.php')"/>
</div>


<select id="typeAdd" onchange="javascript:changeAdd()">
  <option value="tekst">Tekst</option>
  <option value="foto">Foto</option>
  <option value="wideo">Wideo</option>
</select>
<div id="back">
</div>

<div id="t0"> Podaj czas trwania: <br>
<input type="text" class='date' id='hour' autocomplete="off" value="00"> :
<input type="text" class='date' id='min' autocomplete="off" value="00"> :
<input type="text" class='date' id='sec' autocomplete="off" value="00"> 
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
$k = 0;
foreach(json_decode(file_get_contents('../schedule.txt')) as list($type, $id, $url, $time)){
	echo "<div>" . $type . "  " . $id . "  " . $url . "  " . $time . " <div id='deleteObject' onclick='javascript:removeObject(". ++$k . ")'> </div> <div id='moveDown' onclick='javascript:moveDown(". $k . ")'>D </div> <div id='moveUp' onclick='javascript:moveUp(". $k . ")'>U </div></div>";
	$k++;
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