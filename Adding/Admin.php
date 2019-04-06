<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styleAdmin.css"> 
</head>
<body>
<style>
#downTitles >a{
	position: absolute;
	font-size: 30px;
	font-weight: 700;
	color: white;
	height: 10%;
	width: 20%;
}
</style>

<div id="background" unselectable="on"  onselectstart="return false;" 
 onmousedown="return false;"> </div>
<div id="downTitles">
<a href="info.php"><div unselectable="on"> Pasek ogloszen </div></a>
<a style="top: 35%" href="schedule.php"><div unselectable="on"> Harmonogram wyswietlania </div></a>
</div>
<div id="time"> </div>

<script type="text/javascript">
function zegar(){
    
    now = new Date();
    var hours = now.getHours();
    var min = now.getMinutes();
    var sec = now.getSeconds();
    
    if (hours < 10) hours = "0" + hours;
    if (min < 10) min = "0" + min;
    if (sec < 10) sec = "0" + sec;
    
    document.getElementById('time').innerHTML = hours + ":" + min + ":" + sec;
        
    setTimeout("zegar()", 1000);
}
zegar();
</script>


</body>
</html>