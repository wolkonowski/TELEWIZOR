<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css"> 
</head>
<body>
<script type="text/javascript" src="script.js"></script>

<div id="obwodka"> </div>

<div id="tlo1"> </div>

<div id="tlo2"> </div>

<div id="pasek"> </div>

<div id = "blok"> <div id="pasek1"> </div> <div id="pasek2"> </div> </div>

<div id="czas"> </div>

<?php

if(isset($_POST['sendMain'])){
	header("Refresh:0");
}

?>

<script type="text/javascript">
function zegar(){
    
    now = new Date();
    var hours = now.getHours();
    var min = now.getMinutes();
    var sec = now.getSeconds();
    
    if (hours < 10) hours = "0" + hours;
    if (min < 10) min = "0" + min;
    if (sec < 10) sec = "0" + sec;
    
    document.getElementById('czas').innerHTML = hours + ":" + min + ":" + sec;
        
    setTimeout("zegar()", 1000);
}
zegar();
start();
</script>


</body>
</html>