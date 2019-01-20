<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styleAdmin.css"> 
</head>
<body>

<div id="background"> 

<div id="time"> </div>

<?php


if (isset($_POST['add'])) {
	echo "abc";
}
?>




<div id="add">


<div id="lab">
<form action="" method="POST">
    <label> Dodaj ogloszenie: </label>
    <input type="text" id='value1' name="value" autocomplete="off" placeholder="Tutaj wpisz tekst...">
  
    <input type="submit" onclick="javascript:submit1()" name="add" value="OK">

</form>
</div>

</div>


</div>

<script type="text/javascript" src="script.js"></script>
</body>
</html>