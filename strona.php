
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="stylle.css"> 
</head>
<body>
<script type="text/javascript" src="script.js"></script>
<script type='text/javascript'>

    (function()
    {
        if( window.localStorage )
        {
            if( !localStorage.getItem('firstLoad') )
            {
                localStorage['firstLoad'] = true;
                window.location.reload();
            }
            else
                localStorage.removeItem('firstLoad');
        }
    })();

</script>
<div id="centrum"> </div>

<div id="pasek"> </div>

<div id = "blok"> <div id="pasek1"> </div> <div id="pasek2"> </div> </div>

<div id="czas"> </div>

<?php

if(isset($POST['sendMain'])){

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
    
    document.getElementById('czas').innerHTML = hours + ":" + min ;
        
    setTimeout("zegar()", 1000);
}
zegar();
start();

window.setInterval(function(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() { 
		if(xhttp.readyState == 4 && xhttp.status == 200) { 
			var x = this.responseText;
			if(x == "YES") restart();
			
		}
    };
	xhttp.open("POST", "Adding/checkPasek.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("check=OK");
	
}, 2000);

</script>

</body>
</html>
