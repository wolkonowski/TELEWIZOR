<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styleAdmin.css"> 
</head>
<body>

<div id="background"> 

<div id="downTitles"> Pasek wiadomosci </div>

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
</div>

</body>
</html>