<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styleAdmin.css"> 
</head>
<body>

<div id="background"> 
<div id="time"> </div>









<div id="add">


<div id="lab">
    <label> Dodaj ogloszenie: </label>
    <input type="text" id='value1' autocomplete="off" placeholder="Tutaj wpisz tekst...">
  
    <input type="submit" onclick="javascript:submit1()" value="OK">

</div>
<div id="red">Ogłoszenie nie może być puste! </div>
</div>

<div id="list">
Lista aktywnych ogloszen:
<div id="list2">

<div id="oglosz"> tak </div>


</div>

<div id="end"> __ </div>
</div>

<div id="add2">
	<input type="submit" id="inputSubmit" onclick="javascript:send()" value="Zaktualizuj pasek ogloszen">
</div>

</div>


<script type="text/javascript" src="script.js"></script>
</body>
</html>