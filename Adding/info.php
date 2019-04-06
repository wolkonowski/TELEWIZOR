<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styleAdmin.css"> 
</head>
<body>

<div id="background"> 
<div id="time"> </div>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 20px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style>










<div id="add">


<div id="lab">
    <label> Dodaj ogloszenie: </label>
	<br>
    <input type="text" id='value1' autocomplete="off" placeholder="Tutaj wpisz tekst..." style="margin-top: 3%">
  <div id = "send"> 
    <input type="submit" style="margin-left: 500%; margin-top: -200%" value="Dodaj" onclick="javascript:submit1()" />
	</div>

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

<div id = "send" style="left: 25%;"> 
    <input type="submit" value="Zaktualizuj pasek ogloszen" onclick="javascript:send()" />
	</div>

</div>


<script type="text/javascript" src="script.js"></script>
</body>
</html>